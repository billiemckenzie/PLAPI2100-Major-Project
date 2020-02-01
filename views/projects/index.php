<?php
require_once("../../controllers/includes.php");

$title = "View Recipe";

require_once("../elements/header.php");
require_once("../elements/nav.php");
?>

<div class="container main-container mt-5 pt-5">
    <?php
    // Check for alerts
    //if (!empty($_SESSION['errors']) && is_array($_SESSION['errors'])) {
        //foreach ($_SESSION['errors'] as $error) {
           // echo "<div class='alert alert-danger'>$error</div>";
        //}
       // unset($_SESSION['errors']);
    //}

    ?>

    <?php

    if (!empty($_GET['id'])) {
        $project_id = $_GET['id'];
        $p_model = new Project;
        $project = $p_model->get_by_id($_GET['id']);
    ?>

        <div class="col-md-8">
            <div class="mt-5">
                <h4><?= $project['title'] ?></h4>
                
                <p>Posted by <?= $project['username'] ?> on <?= date("M d, Y", strtotime($project['date_uploaded'])) ?></p>
                <div class="mt-5">
                    <img class="main-photo" src="<?= $project['file_url'] ?> " class="img-fluid w-100">
                </div>
                <div class="mt-5">
                    <p><?= $project['description'] ?></p>
                </div>
                <hr class="mt-5 mb-5">
                <div class="mb-5 pb-5">
                    <h6>Recipe:</h6>
                    <p class="pre-line"><?= $project['full_recipe'] ?></p>
                </div>
                <?php
                if ($_SESSION['user_logged_in'] == $project['user_id']) {
                ?>
                    <p class="pb-5">
                        <a href="/projects/edit.php?id=<?= $project['id'] ?>" class="btn btn-secondary">Edit Recipe</a>
                    </p>
                <?php
                }
                ?>
            </div>
        </div>

        <hr class="mt-5 mb-5">

        <div class="row mb-5 mt-5 pt-5">
            <div class="col-6 text-left mb-5">
                <h4>This recipe was created by chef <?=$project['username']?></h4>
                <p class="pt-3">View profile for <a href="/users?id=<?= $project['user_id'] ?>"><?= $project['username'] ?></a></p>
                <h6 class="pt-5 mb-3">Other recipes shared by chef <?=$project['username']?>:</h6>
                <?php
                $user_projects = $p_model->get_by_user_id($project["user_id"]);
                foreach ($user_projects as $user_project){
                ?>
                <a href="/projects/index.php?id=<?= $user_project['id'] ?>"><?= $user_project['title'] ?></a><br>
                <?php
                }
                ?>
            </div>
            <div class="col-6">
                <img class="med-img" src="<?= $project['profile_pic'] ?>">
            </div>
        </div>
        <div class="col-12 text-center mb-5 pb-5 mt-5 pt-5">
            <a class="btn btn-secondary" href="/">Back to Home</a>
        </div>

    <?php
    } else {
        $p_model = new Project;
        $projects = $p_model->get_all();
    }
    ?>

</div>



<?php
require_once("../elements/footer.php")
?>