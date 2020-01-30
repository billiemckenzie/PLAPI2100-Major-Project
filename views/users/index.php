<?php
require_once("../../controllers/includes.php");

$title = "Profile";

require_once("../elements/header.php");
require_once("../elements/nav.php");



// Check if the id is set
// If it is, get the user by id and pass data
// else, load current user

if (!empty($_GET['id'])) {
    $user_id = $_GET['id'];
    $u_model = new User;
    $selected_user = $u_model->get_by_id($_GET['id']);
} else {
    $selected_user = $current_user;
}

?>


<div class="container main-container">
    <div class="row mt-5">
        <div class="col-md-4 mt-5">
            <img class="med-img" src="<?= $selected_user['profile_pic'] ?>">
        </div>
        <div class="col-md-6 mt-5 mx-auto">
            <h2 class="mb-5"><?= $selected_user['username'] ?>'s Profile</h2>
            <p class="pb-5">Full Name:<br><?= $selected_user['firstname'] . ' ' . $selected_user['lastname'] ?></p>
            <p class="pb-5">Bio:<br><?= $selected_user['bio'] ?></p>

            <?php
            if ($_SESSION['user_logged_in'] == $selected_user['id']) {

            ?>
                <p>
                    <a href="/users/edit.php" class="btn btn-secondary">Edit Profile</a>
                </p>
            <?php
            }
            ?>
        </div>



        <div>
            <hr class="mt-5 mb-5">
            <h4 class="mb-5">Recipes Shared by <?= $selected_user['firstname'] ?>:</h4>
            <div class="row mb-5">
                <div class="mt-3 col-md-6 mx-auto">
                    <div id="projectFeed" class="row">
                        <?php
                        // Get all projects by this user
                        $p_model = new Project;
                        $user_projects = $p_model->get_by_user_id($selected_user['id']);
                        $c_model = new Comment;

                        foreach ($user_projects as $user_project) {
                        ?>
                            <div class="card mt-4 ml-5 project-post" id="sharedProjectCard">
                                <div class="card-img">
                                    <img class="feed-photo" src="<?= $user_project['file_url'] ?> " class="img-fluid w-100">
                                </div>
                                <div class="card-body">

                                    <h5><?= $user_project['title'] ?></h5>
                                    <?php
                                    $love_class = 'far';
                                    if (!empty($user_project['love_id'])) {
                                        $love_class = 'fas';
                                    }
                                    ?>

                                    <div class="project-meta">
                                        <span class="float-right comment-btn">
                                            <i class="far fa-comment"></i>
                                            <span class="comment-count">
                                                <?php
                                                echo $c_model->get_count($user_project['id']);
                                                ?>
                                            </span>
                                        </span>

                                        <span class="love-btn float-right pr-3" data-project="<?= $user_project['id'] ?>">
                                            <i class="<?= $love_class ?> fa-heart text-secondary love-icon"></i>
                                            <span class="love-count"><?= $user_project['love_count'] ?></span>
                                        </span>
                                    </div>

                                    <div class="comment-loop pt-4">
                                        <?php
                                        $project_comments = $c_model->get_all_by_project_id($user_project['id']);
                                        foreach ($project_comments as $user_comment) {
                                            $my_comment = ($user_comment['user_owns'] == "true") ? "my_comment" : "";
                                        ?>
                                            <div class="user-comment <?= $my_comment ?>">
                                                <p>
                                                    <span class='font-weight-bold comment-username'><?= $user_comment['username'] . ': ' ?></span>
                                                    <?= $user_comment['comment'] ?>
                                                </p>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div> <!-- End of comment-loop -->

                                    <form class="comment-form" data-project="<?= $user_project['id'] ?>">
                                        <input type="text" name="comment" placeholder="Add a comment..." class="form-control comment-box">
                                    </form>

                                    <p><small class="text-muted">Posted <?= date("M d, Y", strtotime($user_project['date_uploaded'])) ?></small></p>
                                    <p class="mt-3"><?= $user_project['description'] ?></p>
                                    <a href="/">See Full Recipe</a>
                                    <div class="mt-5">
                                        <h6>Posted by: <a href="/users?id=<?= $user_project['user_id'] ?>"><?= $user_project['username'] ?></a></h6>
                                        <?php
                                        if ($user_project['user_id'] == $_SESSION['user_logged_in']) {
                                        ?>
                                            <span class="float-right small-icons">
                                                <a class="post-icons" href="/projects/edit.php?id=<?= $user_project['id'] ?>"><i class="fas fa-edit"></i></a>
                                                <a class="post-icons" href="/projects/delete.php?id=<?= $user_project['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                                            </span>
                                        <?php
                                        }
                                        ?></h6>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once("../elements/footer.php")
?>