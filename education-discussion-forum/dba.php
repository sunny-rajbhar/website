<?php
$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "forum";

$conn = mysqli_connect($servername, $user, $pass, $dbname);

if (!$conn) {
    die("connection failed:".mysqli_connect_error());
}
