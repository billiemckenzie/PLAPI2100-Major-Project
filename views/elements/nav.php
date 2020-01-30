<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="mx-auto">
            <a class="navbar-brand" href="/">
                <img class="logo-img" src="/images/instachef_logo.png">
            </a>
        </div>
        <?php
        //if user is logged in(session is NOT empty)
        if (!empty($_SESSION['user_logged_in'])) { ?>

            <!--navbar-toggler = mobile collapsed button-->
            <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNavBar">
                <i class="fas fa-hamburger"></i>
            </button>

            <!--navbar-collapse=mobile collapse-->
            <div class="navbar-collapse" id="mainNavBar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <div class="row">
                            <div>
                                <img class="nav-image text-right mr-3 mt-3" src="<?= $current_user['profile_pic'] ?> ">
                            </div>
                            <a class="nav-link dropdown-toggle addpointer" id="account-dropdown" data-toggle="dropdown">Welcome back <h6><?= $current_user['username'] ?></h6></a>
                            <div class="dropdown-menu text-right addpointer">
                                <a class="dropdown-item" href="/users/">View Profile</a>
                                <a class="dropdown-item" href="/users/logout.php">Log Out</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        <?php } ?>
    </div>
</nav>