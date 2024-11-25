<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

// SQL query to get the total orders
$order_query = $conn->prepare("SELECT * FROM `orders`");
$order_query->execute();
$orders = $order_query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Orders Report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<!-- header section starts -->
<?php include '../components/admin_header.php' ?>
<!-- header section ends -->

<div class="heading">
    <h3>Total Orders Report</h3>
</div>

<section class="orders-report">
    <h3>Order List</h3>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Total Products</th>
                <th>Total Price</th>
                <th>Payment Status</th>
                <th>Placed On</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($orders) > 0): ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order['id'] ?></td>
                        <td><?= $order['user_id'] ?></td>
                        <td><?= $order['name'] ?></td>
                        <td><?= $order['email'] ?></td>
                        <td><?= $order['number'] ?></td>
                        <td><?= $order['address'] ?></td>
                        <td><?= $order['method'] ?></td>
                        <td><?= $order['total_products'] ?></td>
                        <td>Rs. <?= $order['total_price'] ?>/-</td>
                        <td style="color:<?= $order['payment_status'] == 'pending' ? 'red' : 'green'; ?>"><?= $order['payment_status'] ?></td>
                        <td><?= $order['placed_on'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="11">No orders found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</section>

<!-- footer section starts -->
<!-- footer section ends -->

<!-- custom js file link -->
<script src="../js/admin_script.js"></script>

</body>
</html>