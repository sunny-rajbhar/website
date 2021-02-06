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

if(isset($_POST['name'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $msg = $_POST['msg'];

    
    $istmt = "INSERT INTO feedback(name, email, subject, msg) VALUES('$name', '$email', '$subject', '$msg')";
    $result = mysqli_query($conn, $istmt);
  
    if ($result) {
        $responce = "<p style='color:white'>"."Your username and password incorrect!"."</p>";
        header("Location: contact.html");
    }else {
        echo "ERROR";
    }
}
?>
