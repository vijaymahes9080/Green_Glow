<?php
session_start();
$admin_user = "admin";
$admin_pass = "pass";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user === $admin_user && $pass === $admin_pass) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
    } else {
        echo "<script>alert('Invalid credentials');window.location='admin_login.html';</script>";
    }
}
?>