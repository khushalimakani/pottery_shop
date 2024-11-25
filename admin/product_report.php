<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

// SQL queries to get the required data
$product_query = $conn->prepare("SELECT COUNT(*) as total_products FROM `products`");
$product_query->execute();
$total_products = $product_query->fetchColumn();

// SQL query to get all products for the product list
$all_products_query = $conn->prepare("SELECT * FROM `products`");
$all_products_query->execute();
$products = $all_products_query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Reports</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">
    
</head>
<body>

<!-- header section starts -->
<?php include '../components/admin_header.php' ?>
<!-- header section ends -->

<div class="heading">
    <h3>Product Reports</h3>
</div>

<section class="reports">
<h2>Total Products: <?= $total_products ?></h2> 

    <h3>Product List</h3>
    <table class="product-report-table">
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Added On</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($products) > 0): ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td>Rs. <?= $product['price'] ?></td>
                        <td><?= $product['category'] ?></td>
                        <td><?= $product['added_on'] ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No products found</td>
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

