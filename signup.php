<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "herbal";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ Check if the 'users' table exists, create if missing
$tableCheck = "SHOW TABLES LIKE 'users'";
$result = $conn->query($tableCheck);

if ($result->num_rows == 0) {
    $createTableSQL = "CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(100) NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTableSQL) === TRUE) {
        echo "Table 'users' created successfully.<br>";
    } else {
        die("Error creating table: " . $conn->error);
    }
}

// ✅ Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are set
    if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["confirm-password"])) {
        $full_name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm-password"];

        // ✅ Password matching check
        if ($password !== $confirm_password) {
            die("Error: Passwords do not match.");
        }

        // ✅ Hash password for security
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // ✅ Check if email already exists
        $checkEmailSQL = "SELECT id FROM users WHERE email = ?";
        $stmt = $conn->prepare($checkEmailSQL);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            die("Error: Email is already registered.");
        }
        $stmt->close();

        // ✅ Insert user into database
        $insertSQL = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertSQL);
        $stmt->bind_param("sss", $full_name, $email, $hashed_password);

        if ($stmt->execute()) {
            echo "✅ Registration successful!";
            header("Location: signin.html");
            exit();
            
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: Missing required fields.";
    }
}

// Close connection
$conn->close();
?>
