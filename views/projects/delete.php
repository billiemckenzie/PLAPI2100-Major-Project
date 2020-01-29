<?php
require_once("../../controllers/includes.php");

$p_model = new Project;
$p_model->delete();

header("Location: /");

?>