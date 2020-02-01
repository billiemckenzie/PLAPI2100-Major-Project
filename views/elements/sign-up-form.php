<div class="hero-banner">
    <div class="row d-flex justify-content-center">
        <div class="col-md-4 text-right mt-5 mr-5">
            <h1 class="text-right">A Community for Chefs and Food Lovers</h1>
            <hr class="md-hr pt-5 mt-5">
            <h5>Sign up today to start browsing recipes from world class chefs, and self-proclaimed home chef elites!</h5>
        </div>

        
        <!--Accordion Start-->
        <div class="accordion col-md-4" id="signupAccordion">

            <!--Signup Start-->
            <div class="card mt-4">
                <div class="card-header" id="signupCard" data-toggle="collapse" data-target="#signupCardBody">
                    <h4>Sign Up for <?= APP_NAME ?></h4>
                </div>

                <div class="card-body collapse" id="signupCardBody" data-parent="#signupAccordion">
                    <?php echo (!empty($_SESSION["create_account_msg"])) ? $_SESSION["create_account_msg"] : ''; ?>
                    <form action="/users/add.php" method="post">
                        <input type="text" class="form-control mb-3" name="username" placeholder="username" required>
                        <input type="email" class="form-control mb-3" name="email" placeholder="email address" required>
                        <input type="password" class="form-control mb-3" name="password" placeholder="password" required>
                        <input type="password" class="form-control mb-3" name="password2" placeholder="confirm password" required>
                        <hr>
                        <h5>Profile Info</h5>
                        <input type="text" class="form-control mb-3" name="firstname" placeholder="First Name" required>
                        <input type="text" class="form-control mb-3" name="lastname" placeholder="Last Name" required>
                        <textarea class="form-control" name="bio" placeholder="Bio"></textarea>
                        <div class="text-right">
                            <button type="submit" class="btn btn-secondary mt-3 ml-">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>

            <!--Signup End-->
            <div class="card mt-4">
                <div class="card-header" id="loginCard" data-toggle="collapse" data-target="#loginCardBody">
                    <h4>Login to <?= APP_NAME ?></h4>
                </div>
                <div class="card-body collapse show" data-parent="#signupAccordion" id="loginCardBody">
                    <?php echo (!empty($_SESSION["login_attempt_msg"])) ? $_SESSION["login_attempt_msg"] : ''; ?>
                    <form action="/users/login.php" method="post">
                        <input type="text" name="username" class="form-control mb-3" placeholder="username or email" required>
                        <input type="password" name="password" class="form-control mb-3" placeholder="password" required>
                        <div class="form-group">
                            <input type="checkbox" name="remember" id="remember" value="true">
                            <label for="remember">Remember me</label>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-secondary">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--Accordion End-->
    </div>
</div>

<div class="container extramargin">
    <div class="row">
        <div class="col-md-6">
            <h2>ABOUT</h2>
            <p class="mt-5">Instachef is a community for food lovers where chefs and gourmets around the world can interact with one another by sharing and promoting food pictures, recipes as well as various food related news and activities. We connect and promote chefs and offer them a platform where they can share interact and inspire. We bring food enthusiasts together through exquisite dishes from around the world courtesy of today’s influencers and tomorrow’s trendsetters.</p>
        </div>
        <div class="col-md-6">
            <img class="med-img" src="images/farmtotable-main@2x.png">
        </div>
    </div>
</div>

<div class="extramargin grey-bg">
    <div class="container extrapadding">
        <div class="row d-flex justify-content-around">
            <div class="col-md-3 text-center">
                <img class="infoicons" src="/images/chefhatx2.png">
                <h3 class="pt-4">CREATE</h3>
            </div>
            <div class="col-md-3 text-center">
                <img class="infoicons" src="/images/chefplatex2.png">
                <h3 class="pt-4">SHARE</h3>
            </div>
            <div class="col-md-3 text-center">
                <img class="infoicons" src="/images/forksknivesx2.png">
                <h3 class="pt-4">EAT!</h3>
            </div>
        </div>
    </div>
</div>

<div class="container extramargin">
    <div class="text-center col-md-7 mx-auto">
        <h2>GET STARTED TODAY</h2>
        <p class="pt-5">Insta chef is a photo sharing and discussion app, giving its members the possibility to reach one another instantly. Members, are able to share and view photos and videos as well as taking pictures and video instantly with the built-In camera. The group chat feature allows members to communicate with a bunch of people at once, and add a photo to make the group easily identifiable. Get started today with your free account and have instant access to the worlds largest database of chefs and world class recipes!</p>
        <button class="btn btn-secondary mt-5">Sign Up</button>
    </div>
</div>



<?php
unset($_SESSION["login_attempt_msg"]);
unset($_SESSION["create_account_msg"]);
?>