<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: signin.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e3f2e1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url("images/hero.jpg");
            background-size: cover;
            background-position: center;
        }
        .dashboard-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
            border: 2px solid #4CAF50;
        }
        .dashboard-container h1 {
            font-size: 26px;
            color: #2e7d32;
        }
        .dashboard-container p {
            font-size: 16px;
            color: #388e3c;
            margin: 10px 0;
        }
        .dashboard-button {
            display: block;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 16px;
            margin: 10px 0;
        }
        .dashboard-button:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!</h1>
        <p>Your email: <?php echo htmlspecialchars($_SESSION["user_email"]); ?></p>

        <!-- Link to Product Page -->
        <a href="product.html" class="dashboard-button">View Products</a>

        <!-- Logout Button -->
        <a href="logout.php" class="dashboard-button">Logout</a>
    </div>
</body>
</html>
