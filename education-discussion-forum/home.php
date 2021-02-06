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
  <div class="col-3 harticle">
    <h1>Forum</h1>
    <p id="para">An Internet forum, or message board, is an online discussion site where
    people can hold conversations in the form of posted messages.
    They differ from chat rooms in that messages are often longer than one line of text,
    and are at least temporarily archived.<br><br>
    Facilitate active discussions with your members on important
      issues concerning your organization or campus.<br/>
      Online discussion forums provide a collaborative environment for members
      to reflect on organization initiatives, express opinions, share thoughts
      and resources, and engage in community-wide discussions.<br>
      This forum is for students where they can ask question and give answers, it will helps to solve 
      there study related problems 
      here they can find answer to questions, if they have any, related question asked below then no need to ask again.</p>
    <a id="pre" href="#" onclick="backDoc()"></a> <a href="#" onclick="loadDoc()">Next></a>
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
<div class="row">
<div class="col-3 msg">
<h3>Posts</h3>
<!--
<?php
echo "<form method='POST' action='".setAnnounce($conn)."'>
    <input type='hidden' name='uid' value='".$_SESSION['id']."'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <button type='submit' name='commentSubmit'>Post</button>
</form>";

echo "Reply";
echo "<form method='POST' action='".setReply($conn)."'>
    <input type='hidden' name='uid' value='".$_SESSION['id']."'>
    <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='reply'></textarea><br>
    <button type='submit' name='replySubmit'>Reply</button>
</form>";
   #getComment($conn);
   #replys($conn)
?>
-->
<span id='comment_message'></span>
   <br />
   <div id='display_comment'></div>
  </div>
  <script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"admin_del.php",
   method:"POST",
   data:form_data,
   dataType:"JSON",
   success:function(data)
   {
    if(data.error != '')
    {
     $('#comment_form')[0].reset();
     $('#comment_message').html(data.error);
     $('#comment_id').val('0');
     load_comment();
    }
   }
  })
 });

 load_comment();

 function load_comment()
 {
  $.ajax({
   url:"fetch_admin.php",
   method:"POST",
   success:function(data)
   {
    $('#display_comment').html(data);
   }
  })
 }

 $(document).on('click', '.reply', function(){
  var comment_id = $(this).attr("id");
  $('#comment_id').val(comment_id);
 });
 
});
</script>
</div>

</div>
</div>

<!-- This is Footer -->
<?php include 'footer.php'; ?>