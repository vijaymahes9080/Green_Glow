<?php
$conn = new mysqli("localhost", "root", "", "herbal");
$result = $conn->query("SELECT * FROM orders");
?>
<!DOCTYPE html>
<html>
<head><title>Orders</title></head>
<body>
  <h2>Orders</h2>
  <table border="1">
    <tr><th>ID</th><th>Name</th><th>Card</th><th>Total</th><th>Date</th></tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['name'] ?></td>
      <td><?= $row['card_number'] ?></td>
      <td><?= $row['total'] ?></td>
      <td><?= $row['created_at'] ?></td>
    </tr>
    <?php } ?>
  </table>
</body>
</html>