<?php
require_once("../../controllers/includes.php");


if( !empty($_POST['title']) && !empty($_POST['description'])){
    $project = new Project;
    $project->add();
}

header ("Location: /");


?>