<!-- Modified Dec 2019 by Sunny -->
<?php
$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "dance";

$conn = mysqli_connect($servername, $user, $pass, $dbname);

// if($conn) {
//     echo "Connection successful";
// }else {
//     echo "Connection unsuccessful";
// }

if(isset($_POST['username'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['pwd'];

    $stmt = "SELECT * FROM users WHERE name = '$name'";
    $result = mysqli_query($conn, $stmt);
    $num = mysqli_num_rows($result);

    if($num == 1) {
        echo "<p style='color:white'>"."This username is already exist!"."</p>";
    }else {
        $istmt='';
        $istmt = "INSERT INTO users(name, email, pass) VALUES('$name', '$email', '$pass')";
        mysqli_query($conn, $istmt);
        header("Location: login.html");
    }
}
?>
