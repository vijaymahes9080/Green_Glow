<?php
$conn = new mysqli("localhost", "root", "", "herbal");

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    
    // First, delete related payments
    $conn->query("DELETE FROM payments WHERE user_id = $delete_id");
    
    // Then, delete the user
    $conn->query("DELETE FROM users WHERE id = $delete_id");
    
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect to the same page
    exit();
}

$result = $conn->query("SELECT * FROM users");
?>
<html>
<head>
  <title>Admin Dashboard</title>
  <style>
    body { 
        font-family: Arial; 
        margin: 0; 
        display: flex; 
        background-color: #f4f4f4; 
    }
    .sidebar { 
        width: 200px; 
        background: #4CAF50; 
        height: 100vh; 
        padding-top: 20px; 
    }
    .sidebar a { 
        display: block; 
        padding: 15px; 
        color: white; 
        text-decoration: none; 
    }
    .sidebar a:hover { 
        background: #388e3c; 
    }
    .content { 
        padding: 20px; 
        flex: 1; 
        background-color: #fff; 
        margin-left: 20px; 
        margin-right: 20px; 
        border-radius: 8px; 
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
    }
    h1, h2 {
        text-align: center;
        color: #333;
    }
    table {
        width: 100%;
        margin: 20px 0;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    th {
        background-color: #4CAF50;
        color: white;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
    .action-buttons {
        display: flex;
        gap: 10px;
    }
    .edit-button, .delete-button {
        padding: 5px 10px;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .edit-button {
        background-color: #007BFF; /* Blue */
    }
    .delete-button {
        background-color: #DC3545; /* Red */
    }
    @media (max-width: 600px) {
        .sidebar {
            width: 100%;
            height: auto;
        }
        .content {
            margin-left: 0;
            margin-right: 0;
        }
        table {
            width: 100%;
        }
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <a style="background-color:red" href="admin_logout.php">Logout</a>
  </div>
  <div class="content">
    <h1>Welcome, Admin</h1>
    <p>Use the side menu to manage the site.</p>

    <h2>Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= isset($row['name']) ? $row['name'] : 'N/A' ?></td>
            <td><?= isset($row['email']) ? $row['email'] : 'N/A' ?></td>
            <td><?= isset($row['created_at']) ? $row['created_at'] : 'N/A' ?></td>
            <td class="action-buttons">
                <a href="edit_user.php?id=<?= $row['id'] ?>" class="edit-button">Edit</a>
                <a href="?delete_id=<?= $row['id'] ?>" class="delete-button" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
  </div>
</body>
</html>