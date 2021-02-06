<?php

$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "forum";

$conn = mysqli_connect($servername, $user, $pass, $dbname);

/*
if($conn) {
    echo "Connection successful";
}else {
    echo "Connection unsuccessful";
}*/

if(isset($_POST['username'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['cpassword'];

    $stmt = "SELECT * FROM users WHERE user = '$name'";
    $result = mysqli_query($conn, $stmt);
    $num = mysqli_num_rows($result);

    if($num == 1) {
        echo "<p style='color:white'>"."This username is already exist!"."</p>";
    }else {
        $istmt='';
        $istmt = "INSERT INTO users(user, email, pass) VALUES('$name', '$email', '$pass')";
        mysqli_query($conn, $istmt);
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/media.css">
</head>
<body class="login-body">
<script type="text/javascript" src="javascript.js"></script>

<div class="register-box">
    <img src="images/avatar.png" class="avatar">
    <h1 id="login-h1">Registration Form</h1>
    <form name="myform" method="post" action="#" onsubmit="return registervalidate()">
        <p>Username</p>
        <input id="user" type="text" name="username" placeholder="Enter Username" autocomplete="off">
        <div class="span">
            <span id="suser"></span>
        </div><br>
        <p>Email</p>
        <input id="email" type="text" name="email" placeholder="Enter Email" autocomplete="off">
        <div class="span">
            <span id="semail"></span>
        </div><br>
        <p>Password</p>
        <input id="pass" type="password" name="password" placeholder="Enter Password">
        <div class="span">
            <span id="spass"></span>
        </div><br>
        <p>Confirm Password</p>
        <input id="cpass" type="password" name="cpassword" placeholder="Enter Confirm Password">
        <div class="span">
            <span id="scpass"></span>
        </div><br>
        <input type="submit" name="submit" value="Submit">
        <a class="reg-btn" href="index.php">Login</a>
        <a href="#">Forget Password</a>
    </form>
</div>
</body>
</html>