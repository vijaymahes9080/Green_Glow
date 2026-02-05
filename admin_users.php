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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
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
            table {
                width: 100%;
            }
        }
    </style>
</head>
<body>
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
        </tr <?php } ?>
    </table>
</body>
</html>