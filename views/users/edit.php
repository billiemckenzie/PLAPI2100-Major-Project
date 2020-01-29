<?php
require_once("../../controllers/includes.php");

// If the form was submitted
if (!empty($_POST)) {
    $user->edit();
    header("Location: /users/");
    exit;
}

$title = "Editing " . $current_user['username'] . "'s Profile";

require_once("../elements/header.php");
require_once("../elements/nav.php");
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto">
            <h2 class="mb-5">Edit Profile</h2>

            <form method="post" enctype="multipart/form-data">
                <img id="img-preview" class="w-100" src="<?= $current_user['profile_pic'] ?>">
                <div class="form-group custom-file mb-5">
                    <input id="file-with-preview" type="file" name="fileToUpload" class="custom-file-input">
                    <label class="custom-file-label">Upload New</label>
                </div>
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" class="form-control" value="<?= $current_user['username'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="first name">First Name</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" value="<?= $current_user['firstname'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" value="<?= $current_user['lastname'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="bio">Bio</label>
                    <textarea id="bio" name="bio" class="form-control" value="<?= $current_user['bio'] ?>"><?= $current_user['bio'] ?></textarea>
                </div>
                <hr>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                    <label for="password">Confirm Password</label>
                    <input type="password" id="password2" name="password2" class="form-control">
                </div>
                <div class="text-right">
                    <button type="submit" class="btn btn-secondary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
require_once("../elements/footer.php")
?>