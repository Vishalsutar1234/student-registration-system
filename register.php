<?php
include 'db.php';
session_start();

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $check = "SELECT * FROM students WHERE email='$email'";
    $result = mysqli_query($conn,$check);

    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('Email Already Exists');</script>";
    }
    else{

        $sql = "INSERT INTO students(name,email,password)
                VALUES('$name','$email','$password')";

        if(mysqli_query($conn,$sql)){

            $_SESSION['email'] = $email;

            echo "<script>
            alert('Registration Successful');
            window.location.href='dashboard.php';
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Register</title>

    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="form-container">

    <h2>Student Register</h2>

    <form method="POST">

        <input type="text" name="name" placeholder="Enter Name" required>

        <input type="email" name="email" placeholder="Enter Email" required>

        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit" name="submit">Register</button>

    </form>

    <p>
        Already have account?
        <a href="login.php">Login</a>
    </p>

</div>

</body>
</html>