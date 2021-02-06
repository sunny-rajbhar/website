<?php 
include 'header.php';
include 'dba.php';
include 'comments.php';
?>
<div class="row">
  <div class="col-3 harticle">
    <h1> Question and Answer will be displayed here</h1>
    <p id="para">If you have any question directly write your question in the TextBox & click submit button,
    and if you want to give answer of any question asked below just click on reply button of that 
    question and cursor will directly point to the TextBox and then you can write reply message to that question/query. </p><br>
    <?php
    #call($conn);
    ?>
    
  </div>
  <div class="col-1 right">
    <div class="aside">
      <h2>What?</h2>
      <p></p>
      <img id="gif" alt="people" src="images/ask.gif" width="250px" height="160px" />
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

<!--
<div class="row">
    <div class="tbox">
    <ul class="ul2">
      <li>
      <h3>Answer Box</h3>
        <textarea id="tarea" rows="5" cols="50" placeholder="answer.."></textarea> <button type="button">Post</button></li>
      <li style="float: left;">
      <h3>Enter your queries here</h3>
      <?php
      echo "<form method='POST' action='".setAnnounce($conn)."'>
          <input type='hidden' name='aid' value='".$_SESSION['id']."'>
          <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
          <textarea name='message'></textarea><br>
          <button type='submit' name='commentSubmit'>Post</button>
          </form>";
       ?>
    </ul>
    </div>
</div>
-->
<div class="row">
  <div class='col-3'>
    <p> Question and Reply Box</p>
    <?php
      echo "<form method='POST' id='comment_form'>
        <div class='form-group'>
        <input type='hidden' name='comment_name' value='".$_SESSION['id']."' id='comment_name' class='form-control' placeholder='Enter Name' />
        </div>
        <div class='form-group'>
        <textarea name='comment_content' id='comment_content' class='form-control' placeholder='Write Query..' rows='5'></textarea>
        </div>
        <div class='form-group'>
        <input type='hidden' name='comment_id' id='comment_id' value='0' />
        <input type='submit' name='submit' id='submit' class='btn btn-info' value='Submit' />
        </div>
      </form>";
    ?>
    <span id='comment_message'></span>
    <br/>
    <div id='display_comment'></div>
  </div>
</div> 

<script>
$(document).ready(function(){
 
 $('#comment_form').on('submit', function(event){
  event.preventDefault();
  var form_data = $(this).serialize();
  $.ajax({
   url:"add_comment.php",
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
   url:"fetch_comment.php",
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
  $('#comment_content').focus();
 });
 
});
</script>

<?php include 'footer.php'; ?>