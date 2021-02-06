<?php

//add_comment.php

$connect = new PDO('mysql:host=localhost;dbname=forum', 'root', '');

$error = '';
$comment_name = '';
$comment_content = '';

if($error == '')
{
 $query = "DELETE FROM tbl_comment WHERE parent_comment_id = $_POST['comment_id']";
 
 $statement = $connect->prepare($query);
 $statement->execute(
   ':parent_comment_id' => $_POST["comment_id"]
 );
 $error = '<label class="text-success">Post Added</label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>