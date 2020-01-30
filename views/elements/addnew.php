<?php
require_once("../../controllers/includes.php");
?>

<div class="card mt-4" id="sharedProjectCard">
<div class="card-body">
    <form action="/projects/add.php" method="post" enctype="multipart/form-data">
        <img id="img-preview" class="w-100">
        <div class="form-group custom-file">
            <input id="file-with-preview" type="file" name="fileToUpload" class="custom-file-input" required>
            <label class="custom-file-label">Upload Image</label>
        </div>
        <div class="form-group mt-3">
            <input class="form-control" type="text" name="title" placeholder="Recipe Title" required>
        </div>
        <div class="form-group mt-3">
            <textarea class="form-control" name="description" placeholder="Recipe Description" rows="10" required></textarea>
        </div>
        <div class="form-group mt-3">
            <textarea class="form-control" name="fullRecipe" placeholder="Full Recipe" rows="20" required></textarea>
        </div>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-secondary">Share Recipe!</button>
        </div>
    </form>
</div>