<?php
$conn = new mysqli("localhost", "root", "", "herbal");
$id = $_GET['id'];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $conn->query("UPDATE products SET name='$name', price='$price', image='$image' WHERE id=$id");
    header("Location: admin_products.php");
    exit();
}
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head><title>Edit Product</title></head>
<body>
  <h2>Edit Product</h2>
  <form method="POST">
    <input type="text" name="name" value="<?= $product['name'] ?>" required><br>
    <input type="number" name="price" value="<?= $product['price'] ?>" required><br>
    <input type="text" name="image" value="<?= $product['image'] ?>" required><br>
    <button type="submit">Update</button>
  </form>
</body>
</html>
