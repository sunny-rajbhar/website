<?php
// Entering Announcement to database announce.php
function setAnnounce($conn) {
    if(isset($_POST['announceSubmit'])){
        $uid = $_POST['name'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $sql = "INSERT INTO reply (name, date, msg) VALUES ('$uid', '$date', '$message')";
        $result = $conn->query($sql);
    }
}
// Getting Announcement from db 
function getAnnounce($conn) {
    $sqli = "SELECT * FROM reply";
    $result = $conn->query($sqli);
    echo "<h3>Announcements</h3>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='post-box'>";
        echo "<b>Heading: ".$row['name']."</b><br>";
        echo "<b>Time: </b>".$row['date']."<br>";
        echo "-".$row['msg'];
        echo "</div>";
    }
}

function adminAnnounce($conn) {
    $sqli = "SELECT * FROM reply";
    $result = $conn->query($sqli);
    echo "<h3>Announcements</h3>";
    while($row = $result->fetch_assoc()) {
        echo "<div class='post-box'>";
        echo "<b>Heading: ".$row['name']."</b><br>";
        echo "<b>Time: </b>".$row['date']."<br>";
        echo "-".$row['msg'];
        echo "";
        echo "<form class='delete-comment' method='POST' action='".deleteAnnounce($conn)."'>
        <input type='hidden' name='aid' value='".$row['aid']."'>
        <button name='announceDelete'>Delete</button>
        </form></div>";
    }
}
function deleteAnnounce($conn) {
    if(isset($_POST['announceDelete'])){
        $aid = $_POST['aid'];
        $sql = "DELETE FROM reply WHERE aid='$aid'";
        $result = $conn->query($sql);
        header("Location: admin_announce.php");
    }
}

// Entering Comments Reply to database
function setReply($conn) {
    if(isset($_POST['replySubmit'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $reply = $_POST['reply'];
        $sql = "INSERT INTO reply (uid, date, reply) VALUES ('$uid', '$date', '$reply')";
        $result = $conn->query($sql);
    }
}
// Getting Comments from database admin.php
function getComment($conn) {
    $sql = "SELECT * FROM tbl_comment";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "<div class='panel panel-default'>
        <div class='panel-heading'>By <b>".$row['comment_sender_name']."</b> on <i>".$row['date']."</i></div>
        <div class='panel-body'><b>Q. </b>".$row['comment']."</div>
        <div class='panel-heading' align='right'>
        <form class='delete-comment' method='POST' action='".deleteComment($conn)."'>
        <input type='hidden' name='cid' value='".$row['comment_id']."'>
        <button name='commentDelete'>Delete</button>
        </form>
        </div>
        </div>";
        /*
        echo "<div class='post-box'><p>";
        echo "<b>By: </b>".$row['comment_sender_name']."<br>";
        echo "<b>On: </b>".$row['date']."<br>";
        echo "-".$row['comment'];
        echo "</p>
        <form class='delete-comment' method='POST' action='".deleteComment($conn)."'>
        <input type='hidden' name='cid' value='".$row['comment_id']."'>
        <button name='commentDelete'>Delete</button>
        </form>
        </div>";*/
    }
}
// Delete Comments from database
function deleteComment($conn) {
    if(isset($_POST['commentDelete'])){
        $cid = $_POST['cid'];
        $sql = "DELETE FROM tbl_comment WHERE comment_id='$cid'";
        $result = $conn->query($sql);
        header("Location: admin.php");
    }
        
}

// get Users users.php
function getUser($conn) {
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
        echo "<div class='post-box'><p>";
        echo "<b>ID:</b>".$row['id']."<br>";
        echo "<b>Name:</b>".$row['user']."<br>";
        echo "<b>Email:</b>".$row['email']."<br>";
        echo "<b>Type:</b>".$row['type']."<br>";
        echo "</p>
        <form class='delete-user' method='POST' action='".deleteUser($conn)."'>
        <input type='hidden' name='id' value='".$row['id']."'>
        <button name='userDelete'>Delete</button>
        </form>
        </div>";
    }
}

function deleteUser($conn) {
    if(isset($_POST['userDelete'])){
        $id = $_POST['id'];
        $sql = "DELETE FROM users WHERE id='$id'";
        $result = $conn->query($sql);
        header("Location: admin.php");
    }
        
}