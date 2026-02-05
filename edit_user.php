<?php
$conn = new mysqli("localhost", "root", "", "herbal");

// Check if the user ID is provided
if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    
    // Fetch the user data
    $result = $conn->query("SELECT * FROM users WHERE id = $user_id");
    $user = $result->fetch_assoc();
    
    // Check if the user exists
    if (!$user) {
        die("User  not found.");
    }
} else {
    die("No user ID provided.");
}

// Handle form submission for updating user
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    
    // Update the user in the database
    $conn->query("UPDATE users SET full_name = '$name', email = '$email' WHERE id = $user_id");
    
    // Redirect back to the users list
    header("Location: admin_users.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST">
        <input type="text" name="name" value="<?= isset($user['name']) ? htmlspecialchars($user['name']) : '' ?>" required placeholder="Name">
        <input type="email" name="email" value="<?= isset($user['email']) ? htmlspecialchars($user['email']) : '' ?>" required placeholder="Email">
        <input type="submit" value="Update User">
    </form>
</body>
</html>