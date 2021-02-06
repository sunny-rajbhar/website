<!-- This is Header -->
<?php 
date_default_timezone_set('Asia/Kolkata');
include 'dba.php';
include 'comments.php';
?>
<?php
/*if(!defined('Myheader')){
    exit('Don't do this);
}*/
session_start();
if($_SESSION['id'] == false) {
    header('location: index.php');
}
#echo $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/media.css">  
</head>
<body background="images/bg.jpg">
<script type="text/javascript" src="javascript.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<div class="row">
<div class="header">
  <div class="col-7 logo">
      <img alt="Forums logo" src="images/logo.png" width="90px" height="90px" />
  </div>
  <div class="col-8 edf">
  <h1>Educational Discussion Forum</h1>
  </div>
</div>
</div>
<div class="row1">
<div class="menu">
  <ul class="ul1">
    <li><a id="demo" onmouseover="onmouse()" onmouseout="outmouse()" href="logout.php">Logout</a></li>
    <li><a href="contact.php">Contact Us</a></li>
    <li><a href="announce.php">Announcement</a></li>
    <li><a href="ask.php">Ask Question</a></li>
    <!--<li class="dropdown">
      <a class="dropbtn">Categories</a>
      <div class="dropdown-content">
        <a href="#">General</a>
        <a href="#">How-to</a>
        <a href="#">Problem</a>
      </div>
    </li>-->
    <li><a href="home.php">Home</a></li>
    <form action="search.php" method="POST">
    <li id="search-bar"><input type="text" placeholder="Search.." name="search">
    <button type="submit" name="submit-search">Submit</button></li>
    </form>
  </ul>
</div>
</div>

<div class="row">
  <div class="col-3 sarticle">
    <h1>Search</h1>
    <?php
    if (isset($_POST['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search']);
        $sql = "SELECT * FROM tbl_comment WHERE comment_sender_name LIKE '%$search%' OR date LIKE '%$search%' 
        OR comment LIKE '%$search%'";
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);
        echo "<b>There are ".$queryResult." results found!</b><br>";
        if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)){
                echo "<div class='panel panel-default'>
                    <div class='panel-heading'>By <b>".$row['comment_sender_name']."</b> on <i>".$row['date']."</i></div>
                    <div class='panel-body'><b>Q. </b>".$row['comment']."</div>
                    
                    </div>";
            }
        }else {
            echo "There are no result matching your search.";
        }
    }
    ?>
  </div>
  <div class="col-1 right">
    <div class="aside">
      <h2>Doubt?</h2>
      <p></p>
      <img alt="Discussion Forums" src="images/ds.jpeg" width="210px" height="155px" />
    </div>
    <div class="tops">
        <table>
            <tr>
            <th>Tops</th>
            </tr>
            <tr>
                <td><a href="https://news.google.com">Latest News</a></td>
            </tr>
            <tr>
                <td><a href="ask.php">Recent Post</a></td>
            </tr>
            <tr>
                <td>Whats New</td>
            </tr>
            <tr>
                <td>Goes here</td>
            </tr>
            <tr>
                <td>_________</td>
            </tr>
            <tr>
                <td height="70"><marquee behavior="scroll" direction="left">
                    <img src="images/ads.jpg" alt="save water" width="110px" height="60px">
                    </marquee>
                    </td>
            </tr>
        </table>
    </div>
  </div>
</div>

</div>
</div>

<!-- This is Footer -->
<?php include 'footer.php'; ?>