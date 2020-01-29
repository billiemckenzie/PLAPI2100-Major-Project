<?php
require_once("../../controllers/includes.php");

$title = "My Profile";

require_once("../elements/header.php");
require_once("../elements/nav.php");
?>

<div class="container main-container">
    <div class="row mt-5">
        <div class="col-md-4 mt-5">
            <img class="med-img" src="<?= $current_user['profile_pic']?>">
        </div>
        <div class="col-md-6 mt-5 mx-auto">
            <h2 class="mb-5">My Profile</h2>
            <p><?= $current_user['firstname'].' '.$current_user['lastname']?></p>
            <p><?= $current_user['email']?></p>
            <p><?= $current_user['bio']?></p>
            <p>
                <a href="/users/edit.php" class="btn btn-secondary">Edit Profile</a>
            </p>
        </div>
    </div>
</div>


<?php 
require_once("../elements/footer.php")
?>