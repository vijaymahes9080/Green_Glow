<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "herbal");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all records from payments
$sql = "SELECT * FROM payments";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Records - Lillyherbals</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0fff0;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #2e7d32;
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f6fff6;
        }

        tr:hover {
            background-color: #e0f2e9;
        }
    </style>
</head>
<body>

    <h2>Payment Records</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Card Number</th>
            <th>Expiry Date</th>
            <th>CVV</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            // Output each row
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['user_id']}</td>
                        <td>{$row['product_name']}</td>
                        <td>{$row['product_price']}</td>
                        <td>{$row['card_number']}</td>
                        <td>{$row['expiry_date']}</td>
                        <td>{$row['cvv']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
        $conn->close();
        ?>
    </table>

</body>
</html>
