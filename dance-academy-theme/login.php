<!-- Modified Dec 2019 by Sunny -->
<?php
session_start();
#define('Myheader', TRUE);

$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "dance";

$conn = mysqli_connect($servername, $user, $pass, $dbname);

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pwd'];

    $stmt = "SELECT * FROM users WHERE email = '$email' AND pass = '$pass'";
    $result = mysqli_query($conn, $stmt);

    if (!$row = mysqli_fetch_assoc($result)) {
        echo "Username and password is incorrect!  Try Again";
        // $msg = "abc";
    } else {
        // $msg = "d-none";
        $_SESSION['id'] = $row['name'];
        #$session_id = session_id();
        #$_SESSION['id'] = $session_id;
        header("Location: index.html");
    }
}
?>
