<?php
require_once("../../controllers/includes.php");

if (!empty($_GET['id'])) {

    $p_model = new Project; // Start Project model
    $project = $p_model->get_by_id($_GET['id']);

    if( !empty($_POST)){
        $p_model->edit($_GET['id']);
        header('Location: /projects/index.php?id='.(int)$_GET['id']);
        exit;
    }

} else {
    header("Location: /");
    exit;
}


require_once("../elements/header.php");
require_once("../elements/nav.php");

?>

<div class="container main-container">
    <div class="row">
        <div class="col-md-8 mt-5">
            <div class="mt-4">
            <h4>Edit Recipe</h4>
            </div>
            <div class="card mt-4 m-5">
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <img id="img-preview" class="w-100" src="<?=$project['file_url']?>">
                        <div class="form-group custom-file">
                            <input id="file-with-preview" type="file" name="fileToUpload" class="custom-file-input">
                            <label class="custom-file-label">Upload</label>
                        </div>
                        <div class="form-group mt-3">
                            <input class="form-control" type="text" name="title" placeholder="Project Title" value="<?=$project['title']?>" required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="description" placeholder="Project Description" rows="20" required><?=$project['description']?></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="full_recipe" placeholder="Full Recipe" rows="50" required><?=$project['full_recipe']?></textarea>
                        </div>
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-secondary">Submit Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

require_once("../elements/footer.php");

?>