<?php
session_start(); // Start a session to manage login state

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

// ✅ Process login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // ✅ Check if the email exists in the database
    $sql = "SELECT id, full_name, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // ✅ If user exists, verify the password
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $full_name, $hashed_password);
        $stmt->fetch();

        // ✅ Verify the entered password with the stored hashed password
        if (password_verify($password, $hashed_password)) {
            // ✅ Login successful - Store user session
            $_SESSION["user_id"] = $id;
            $_SESSION["user_name"] = $full_name;
            $_SESSION["user_email"] = $email;

            // ✅ Redirect to dashboard or homepage
            header("Location: dashboard.php");
            exit();
        } else {
            echo "❌ Incorrect password. Please try again.";
        }
    } else {
        echo "❌ No account found with this email.";
    }
    $stmt->close();
}

$conn->close();
?>
