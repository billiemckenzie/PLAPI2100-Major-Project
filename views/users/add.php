<?php
/*
*   /users/add.php
*   handles the adding of new users to the database
*/
require_once("../../controllers/includes.php");

// Check if all fields are filled first
// Create a new user object
// Check if the user already exists in the database
// if not, add them to the database
// Redirect to the homepage once added

// Check if all fields are filled first
if( !empty($_POST['username']) && 
    !empty($_POST['email']) && 
    !empty($_POST['password']) &&
    !empty($_POST['firstname']) &&
    !empty($_POST['lastname']) &&
    !empty($_POST['bio']) ){
    
        // create a new user object
        $user = new User;

        // Check if the user already exists in the database
        $exists = $user->exists();

        if( empty($exists) ){
            // if not, add them to the database
            $new_user_id = $user->add();
            // takes the new user id just created and adds it to the session data
            $_SESSION["user_logged_in"] = $new_user_id;
        } else {
            $_SESSION["create_account_msg"] = "<p class='text-danger'> User Already Exists </p>";
        }

}

// Redrect to the homepage once added
if (!APP_DEBUG) header("Location: /");

?>