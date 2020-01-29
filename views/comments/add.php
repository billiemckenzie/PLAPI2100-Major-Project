<?php
require_once("../../controllers/includes.php");

$comment_data = array(
    'error' => true
);

// if the comment form submitted and project ID is set
if( !empty($_POST['project_id'])) {
    
    // add new comment to the database
    $c_model = new Comment;
    $comment_data = $c_model->add($comment_data);
}

echo json_encode($comment_data);
die();