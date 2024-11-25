<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

// SQL query to get the total users
$user_query = $conn->prepare("SELECT * FROM `users`");
$user_query->execute();
$users = $user_query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Users Report</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<!-- header section starts -->
<?php include '../components/admin_header.php' ?>
<!-- header section ends -->

<div class="heading">
    <h3>Total Users Report</h3>
</div>

<section class="users-report">
    <h3>User List</h3>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Address</th>
                <th>Registered On</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($users) > 0): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['number'] ?></td>
                        <td><?= $user['address'] ? $user['address'] : 'Not Provided' ?></td>
                        <td>COD</td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No users found</td>
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