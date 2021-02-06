<?php
session_start();
if($_SESSION['id']==false) {
    header('location: index.php');
}

?>