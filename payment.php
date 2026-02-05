<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "herbal";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the JSON data from the request
$data = json_decode(file_get_contents("php://input"), true);

// Extract payment details
$name = $data['name'];
$card_number = $data['card_number'];
$expiry_date = $data['expiry_date'];
$cvv = $data['cvv'];
$cart = $data['cart'];

// Check if the cart is empty
if (empty($cart)) {
    echo json_encode(['success' => false, 'message' => 'Cart is empty.']);
    exit();
}

// Insert payment details into the database
foreach ($cart as $item) {
    $product_name = $item['name'];
    $product_price = $item['price'];

    $insertSQL = "INSERT INTO payments (user_id, product_name, product_price, card_number, expiry_date, cvv) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertSQL);
    $user_id = 1; // Replace with the actual user ID from the session or authentication
    $stmt->bind_param("isssss", $user_id, $product_name, $product_price, $card_number, $expiry_date, $cvv);

    if (!$stmt->execute()) {
        echo json_encode(['success' => false, 'message' => 'Error processing payment: ' . $stmt->error]);
        exit();
    }
}

echo json_encode(['success' => true]);
$stmt->close();
$conn->close();
?>