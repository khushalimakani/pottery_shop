<?php
include '../components/connect.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
}

// Function to generate PDF and Excel downloads
function downloadReport($type, $data) {
    // Implement your download logic here
    // This function should handle the data and generate either a PDF or Excel file based on the $type parameter
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>

<?php include '../components/admin_header.php'; ?>

<!-- Reports section starts -->
<section class="reports">

    <h1 class="heading">Reports</h1>

    <div class="box-container">

        <!-- Product List Section -->
        <div class="box">
            <h3>Product List</h3>
            <a href="download_product_list.php?type=pdf" class="btn">Download PDF</a>
            <a href="download_product_list.php?type=excel" class="btn">Download Excel</a>
        </div>

        <!-- Total Order List Section -->
        <div class="box">
            <h3>Total Orders</h3>
            <a href="download_order_list.php?type=pdf" class="btn">Download PDF</a>
            <a href="download_order_list.php?type=excel" class="btn">Download Excel</a>
        </div>

        <!-- Yearly Report Section -->
        <div class="box">
            <h3>Yearly Report</h3>
            <form action="generate_yearly_report.php" method="POST">
                <input type="year" name="year" required>
                <input type="submit" value="Generate Report" class="btn">
            </form>
        </div>

        <!-- Monthly Report Section -->
        <div class="box">
            <h3>Monthly Report</h3>
            <form action="generate_monthly_report.php" method="POST">
                <input type="month" name="month" required>
                <input type="submit" value="Generate Report" class="btn">
            </form>
        </div>

        <!-- Pending and Complete Orders Section -->
        <div class="box">
            <h3>Pending and Complete Orders</h3>
            <form action="generate_order_status_report.php" method="POST">
                <select name="status" required>
                    <option value="pending">Pending Orders</option>
                    <option value="completed">Completed Orders</option>
                </select>
                
                <input type="submit" value="Generate Report" class="btn">
            </form>
        </div>

        <!-- Total Users Section -->
        <div class="box">
            <h3>Total Users</h3>
            <form action="generate_user_report.php" method="POST">
                <input type="submit" value="Generate Report" class="btn">
            </form>
        </div>

    </div>

</section>
<!-- Reports section ends -->

<!-- custom js file link -->
<script src="../js/admin_script.js"></script>

</body>
</html>