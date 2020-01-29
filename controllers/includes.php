<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
if( !isset($_SESSION) ) session_start();

// manages inclusion of all controller and model files

// Create a constant variable to hold the path to the root directory of the project

// instead of using: $_SERVER["DOCUMENT_ROOT"];
// substring - substract portion out of your string
// Find the last occurance of a "/", and outputs what is left
define('APP_ROOT',  substr(__DIR__, 0, strrpos(__DIR__, DIRECTORY_SEPARATOR)) );

define('APP_NAME', 'Insta Chef');
define('APP_DEBUG', false);

require_once(APP_ROOT . "/controllers/db.php");
require_once(APP_ROOT . "/controllers/util.php");


//automatically include all files in the /models folder
spl_autoload_register(function($class){
    // $class = User or Comment or Post
    // add any .php file extension with the class name to match, but must be lowercase
    // Change 'User' to 'user' and add '.php'
    $filename = strtolower($class) . '.php';

    // Check if the class file exists and is in the model folder
    if(file_exists( APP_ROOT . '/models/' . $filename)){
        require_once(APP_ROOT . '/models/' . $filename);
    }
});

if(!empty($_COOKIE['user_logged_in'])) {
    $user =  new User;
    $_SESSION['user_logged_in'] = $_COOKIE['user_logged_in'];
}

if(!empty($_SESSION['user_logged_in'])){
    //sets up a new User object
    $user = new User;
        
    // gets all of that users data 
    $current_user = $user->get_by_id($_SESSION['user_logged_in']);
}

?>