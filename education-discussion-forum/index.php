<!-- php authen -->
<?php
session_start();
#define('Myheader', TRUE);

$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "forum";

$conn = mysqli_connect($servername, $user, $pass, $dbname);

if(isset($_POST['submit'])) {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $stmt = "SELECT * FROM users WHERE user = '$name' AND pass = '$pass'";
    $result = mysqli_query($conn, $stmt);

    if (!$row = mysqli_fetch_assoc($result)) {
        echo "<p style='color:white'>"."Your username and password incorrect!"."</p>";
    } else {
        if($row['type'] == 1) {
            $_SESSION['id'] = $row['type'];
            header("Location: admin.php");
            
        }else {
            $_SESSION['id'] = $row['user'];
            #$session_id = session_id();
            #$_SESSION['id'] = $session_id;
            header("Location: home.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/media.css">
</head>
<body class="login-body">
<script type="text/javascript" src="javascript.js"></script>
<?php /*
    if(isset($_SESSION['id'])) {
        echo "Logged in";
    }else {
        echo "Not Logged in";
    }*/
?>
<h2 class="welcome">Welcome in Discussion Forum</h2>
<div class="login-box">
    <img src="images/avatar.png" class="avatar">
    <h1 id="login-h1">Login Here</h1>
    <form name="myform" method="POST" action="#" onsubmit="return loginvalidate()">
        <p>Username</p>
        <input id="user" type="text" name="username" placeholder="Enter Username" autocomplete="off">
        <div class="span">
            <span id="suser"></span>
        </div><br>
        <p>Password</p>
        <input id="pass" type="password" name="password" placeholder="Enter Password">
        <div class="span">
            <span id="spass"></span>
        </div><br>
        <input type="submit" name="submit" value="Login">
        <a class="reg-btn" href="register.php">Register</a>
        <a class="f-pass" href="#">Forget Password</a>
    </form>
</div>
</body>
</html>