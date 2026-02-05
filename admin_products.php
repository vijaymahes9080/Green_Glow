<?php
$conn = new mysqli("localhost", "root", "", "herbal");
$result = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manage Products</title>
  <style>
    body { font-family: Arial; padding: 20px; background: #f1f8e9; }
    table { width: 100%; border-collapse: collapse; background: white; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    th { background: #c8e6c9; }
    .btn { padding: 5px 10px; text-decoration: none; color: white; border-radius: 3px; }
    .edit { background: #1976D2; }
    .delete { background: #D32F2F; }
    .add { background: #388e3c; }
  </style>
</head>
<body>
  <h2>Product Management</h2>
  <a href="admin_add_product.php" class="btn add">+ Add Product</a>
  <table>
    <tr><th>ID</th><th>Name</th><th>Price</th><th>Image</th><th>Actions</th></tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= htmlspecialchars($row['name']) ?></td>
      <td><?= $row['price'] ?></td>
      <td><img src="<?= $row['image'] ?>" width="50"></td>
      <td>
        <a href="admin_edit_product.php?id=<?= $row['id'] ?>" class="btn edit">Edit</a>
        <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete?')" class="btn delete">Delete</a>
      </td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>
