<?php
require_once("../controllers/includes.php");


$title = "Home Page";

require_once("elements/header.php");
require_once("elements/nav.php");

$user = new User;

?>

<?php
// if the user_logged_in session variable is not set with a user ID
if (empty($_SESSION['user_logged_in'])) {
    //show logged in form
    require_once("elements/sign-up-form.php");
} else {
?>



    <div class="container mt-5">
        <div class="col-md-12">

            <div class="input-group mb-5 mx-auto col-12">
                <form class="form-inline col-md-8" id="search_form">
                    <input type="seach" autocomplete="off" name="search" id="search" class="form-control" placeholder="Search Recipes...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="search-btn"><i class="fas fa-search"></i></button>
                    </div>
                    <div id="search_results">

                    </div>
                </form>
            </div>


            <?php
            // Check for alerts
            if (!empty($_SESSION['errors']) && is_array($_SESSION['errors'])) {
                foreach ($_SESSION['errors'] as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
                unset($_SESSION['errors']);
            }

            ?>
        </div>

        <div class="row mb-5">
            <div class="mt-3 col-md-6 mx-auto">
                <div id="projectFeed" class="row">
                    <?php
                    $p_model = new Project;
                    $projects = $p_model->get_all();
                    $c_model = new Comment; // Get an instance of the Comment Model

                    foreach ($projects as $project) {
                    ?>
                        <div class="card mt-4 ml-5 project-post" id="sharedProjectCard">
                            <div class="card-img">
                                <img class="feed-photo" src="<?= $project['file_url'] ?> " class="img-fluid w-100">
                            </div>
                            <div class="card-body">

                                <h5><?= $project['title'] ?></h5>
                                <?php
                                $love_class = 'far';
                                if (!empty($project['love_id'])) {
                                    $love_class = 'fas';
                                }
                                ?>

                                <div class="project-meta">
                                    <span class="float-right comment-btn">
                                        <i class="far fa-comment"></i>
                                        <span class="comment-count">
                                            <?php
                                            echo $c_model->get_count($project['id']);
                                            ?>
                                        </span>
                                    </span>

                                    <span class="love-btn float-right pr-3" data-project="<?= $project['id'] ?>">
                                        <i class="<?= $love_class ?> fa-heart text-secondary love-icon"></i>
                                        <span class="love-count"><?= $project['love_count'] ?></span>
                                    </span>
                                </div>

                                <div class="comment-loop pt-4">
                                    <?php
                                    $project_comments = $c_model->get_all_by_project_id($project['id']);
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

                                <form class="comment-form" data-project="<?= $project['id'] ?>">
                                    <input type="text" name="comment" placeholder="Add a comment..." class="form-control comment-box">
                                </form>

                                <p><small class="text-muted">Posted <?= date("M d, Y", strtotime($project['date_uploaded'])) ?></small></p>
                                <p class="mt-3"><?= $project['description'] ?></p>
                                <a href="/projects/index.php?id=<?= $project['id'] ?>">See Full Recipe</a>
                                <div class="mt-5">
                                    <h6>Posted by: <a href="/users?id=<?= $project['user_id'] ?>"><?= $project['username'] ?></a></h6>
                                        <?php
                                        if ($project['user_id'] == $_SESSION['user_logged_in']) {
                                        ?>
                                            <span class="float-right small-icons">
                                                <a class="post-icons" href="/projects/edit.php?id=<?= $project['id'] ?>"><i class="fas fa-edit"></i></a>
                                                <a class="post-icons" href="/projects/delete.php?id=<?= $project['id'] ?>"><i class="fas fa-trash-alt"></i></a>
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
            <div class="col-md-4 mt-4 text-right mr-5" id="searchArea">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-secondary drillbtn" id="addnewrecipe" data-toggle="modal" data-target="#exampleModal">
                    + Add New Recipe
                </button>
            </div> <!-- end of sharedProjectCard-->
        </div>
    </div>
<?php
}
?>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Add New Recipe</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>


<?php
require_once("elements/footer.php")
?>