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

if(isset($_POST['update'])){

    $name = $_POST['name'];
    $new_email = $_POST['email'];
    $password = $_POST['password'];

    $update = "UPDATE students 
               SET name='$name',
               email='$new_email',
               password='$password'
               WHERE email='$email'";

    if(mysqli_query($conn,$update)){

        $_SESSION['email'] = $new_email;

        echo "<script>
        alert('Profile Updated Successfully');
        window.location.href='dashboard.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Profile</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="form-container">

    <h2>Edit Profile</h2>

    <form method="POST">

        <input type="text"
               name="name"
               value="<?php echo $row['name']; ?>"
               required>

        <input type="email"
               name="email"
               value="<?php echo $row['email']; ?>"
               required>

        <input type="text"
               name="password"
               value="<?php echo $row['password']; ?>"
               required>

        <button type="submit" name="update">
            Update Profile
        </button>

    </form>

</div>

<?php include 'footer.php'; ?>

</body>
</html>