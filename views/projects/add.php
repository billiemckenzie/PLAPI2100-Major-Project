<?php
require_once("../../controllers/includes.php");


if( !empty($_POST['title']) && !empty($_POST['description'])){
    // Add new project
    $project = new Project;
    $project->add();
}

header ("Location: /");


?>