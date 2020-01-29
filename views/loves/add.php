<?php
require_once("../../controllers/includes.php");

$love_data = array(
    'error' => true
);

if( !empty( $_POST['project_id'])){
    // Add new love to database
    $love = new Love;
    $love_data = $love->add($love_data);
}

echo json_encode($love_data);
exit;


?>