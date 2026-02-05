<?php
$servername = "localhost"; // Change if needed
$username = "root"; // Change if you have a different DB user
$password = ""; // Change if you have a DB password
$database = "herbal"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Insert data into the database
$sql = "INSERT INTO feedback (name, email, phone, message) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $email, $phone, $message);

if ($stmt->execute()) {
    echo "<script>alert('Feedback submitted successfully!'); window.location.href='contact.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
