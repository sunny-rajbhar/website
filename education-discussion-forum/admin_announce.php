<?php 
include 'dba.php';
include 'comments.php';
?>
<?php
/*if(!defined('Myheader')){
    exit('Don't do this);
}*/
session_start();
if($_SESSION['id']==false) {
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin_Announce</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/media.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body background="images/bg.jpg">
<script type="text/javascript" src="javascript.js"></script>
<div class="row">
<div class="header">
  <div class="col-7 logo">
      <img alt="Forums logo" src="images/logo.png" width="90px" height="90px" />
  </div>
  <div class="col-8 edf">
  <h1>Admin</h1>
  </div>
</div>
</div>
<div class="row1">
<div class="menu">
  <ul class="ul1">
    <li><a id="demo" onmouseover="onmouse()" onmouseout="outmouse()" href="logout.php">Logout</a></li>

    <!--<li><a href="ask.php">Ask Question</a></li>-->
    <li><a href="users.php">Users</a></li>
    <li><a href="announce.php">Announcement</a></li>
    <li><a href="admin.php">Home</a></li>
    <li id="search-bar"><input type="text" placeholder="Search.." name="search">
    <button type="submit">Submit</button></li>
  </ul>
</div>
</div>

<div class="row">
  <div class="col-4">
    <div class="ann">
    <h3>Announce</h3>

<?php
echo "<form method='POST' action='".setAnnounce($conn)."'>
    <input type='text' name='name' placeholder='Heading' ><br><br>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message' placeholder='Description'></textarea><br>
    <button type='submit' name='announceSubmit'>Publish</button>
</form>";
/*
echo "Reply";
echo "<form method='POST' action='".setReply($conn)."'>
    <input type='hidden' name='uid' value='".$_SESSION['id']."'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='reply'></textarea><br>
    <button type='submit' name='replySubmit'>Reply</button>
</form>";*/
?>
<?php
   adminAnnounce($conn);
?>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>