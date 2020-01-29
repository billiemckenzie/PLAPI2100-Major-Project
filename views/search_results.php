<?php
include_once('../controllers/includes.php');

/* if query starts with @
        Get user model and return user results
    else
        Get projecy model and return project results
*/

$query = $_GET['search']; 

if($query[0] == "@"){
    $u_model = new User;
    $user_results = $u_model->get_all();

    echo json_encode($user_results);

}else{
    $p_model = new Project;
    $project_results = $p_model->get_all();

    echo json_encode($project_results);

}