<?php
require_once("../../controllers/includes.php");

$title = "View Recipe";

require_once("../elements/header.php");
require_once("../elements/nav.php");
?>

<div class="container main-container">
    <?php
    // Check for alerts
    if (!empty($_SESSION['errors']) && is_array($_SESSION['errors'])) {
        foreach ($_SESSION['errors'] as $error) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
        unset($_SESSION['errors']);
    }

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
                <p>Posted by <?= $project['username'] ?> on <?php date("M d, Y", strtotime($project['date_uploaded'])) ?></p>
                <div class="mt-5">
                    <img class="main-photo" src="<?= $project['file_url'] ?> " class="img-fluid w-100">
                </div>
                <div class="mt-5">
                    <p><?= $project['description'] ?></p>
                </div>
                <hr class="mt-5 mb-5">
                <div class="mb-5 pb-5">
                    <h6>Recipe:</h6>
                    <p><?= $project['full_recipe'] ?></p>
                </div>
                <?php
                if ($_SESSION['user_logged_in'] == $project['user_id']) {
                ?>
                    <p>
                        <a href="/projects/edit.php?id=<?= $project['id'] ?>" class="btn btn-secondary">Edit Recipe</a>
                    </p>
                <?php
                }
                ?>
            </div>
        </div>

        <hr class="mt-5 mb-5">

        <div class="col-12 text-center">
            <h5>See more from <?= $project['username'] ?></h5>

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