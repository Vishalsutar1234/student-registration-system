<?php
session_start();
include 'db.php';

if(!isset($_SESSION['email'])){
    header("Location: login.php");
}

$email = $_SESSION['email'];

$query = "SELECT * FROM students WHERE email='$email'";
$result = mysqli_query($conn,$query);

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>

    <title>Dashboard</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="dashboard">

    <h2>Student Details</h2>

    <hr>

    <h3>Name: <?php echo $row['name']; ?></h3>

    <h3>Email: <?php echo $row['email']; ?></h3>

</div>

<?php include 'footer.php'; ?>

</body>
</html>