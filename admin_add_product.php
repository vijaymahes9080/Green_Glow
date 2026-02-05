<?php
$conn = new mysqli("localhost", "root", "", "herbal");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $conn->query("INSERT INTO products (name, price, image) VALUES ('$name', '$price', '$image')");
    header("Location: admin_products.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head><title>Add Product</title></head>
<body>
  <h2>Add Product</h2>
  <form method="POST">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="number" name="price" placeholder="Price" required><br>
    <input type="text" name="image" placeholder="Image URL" required><br>
    <button type="submit">Add</button>
  </form>
</body>
</html>
