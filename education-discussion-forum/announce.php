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
    <title>Home</title>
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
    <li><a href="home.php">Home</a></li>
    <li id="search-bar"><input type="text" placeholder="Search.." name="search">
    <button type="submit">Submit</button></li>
  </ul>
</div>
</div>

<div class="row">
  <div class="col-4 article">
    <h4>These are the Announcements or Events posted by community.</h4>

<?php
/*
echo "<form method='POST' action='".setAnnounce($conn)."'>
    <input type='text' name='name' ><br><br>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <button type='submit' name='announceSubmit'>Post</button>
</form>";

echo "Reply";
echo "<form method='POST' action='".setReply($conn)."'>
    <input type='hidden' name='uid' value='".$_SESSION['id']."'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='reply'></textarea><br>
    <button type='submit' name='replySubmit'>Reply</button>
</form>";*/
?>
<CENTER>
<?php
   getAnnounce($conn);
?>
</CENTER>    
  </div>
</div>

<?php include 'footer.php'; ?>