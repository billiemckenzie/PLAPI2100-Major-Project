<?php

class DB {

    public $data = array();
    public $params = array();


    function __construct(){
        //Run as soon as db class is called

        // Store all our $_POST data in the $data variable
        if( !empty($_POST)){

            $conn = $this->conn();
            $escPost = array();
            //for each peice of data in the post data, loop through each as
            foreach($_POST as $key => $value){
                $escPost[$key] = trim( mysqli_real_escape_string($conn, $value) );
            }
            $conn->close();
            $this->data = $escPost;
        }

        // Store all our $_GET data in the $data variable
        if( !empty($_GET)){

            $conn = $this->conn();
            $escGet = array();
            //for each peice of data in the post data, loop through each as
            foreach($_GET as $key => $value){
                $escGet[$key] = trim( mysqli_real_escape_string($conn, $value) );
            }
            $conn->close();
            $this->params = $escGet;
        }
    }

    protected function conn() {
        
        if($_SERVER["SERVER_NAME"] == "dev.billiemckenzie.ca") {
            $dbservername = "localhost";
            $dbusername = "InstaChef_user";
            $dbpassword = "W#9m9y7b";
            $dbname = "InstaChef";
            } else {
            $dbservername = 'localhost';
            $dbusername = 'root';
            $dbpassword = 'root';
            $dbname = 'InstaChef';
            }

        $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

        if($conn->connect_error){
            die("connection Failed: " . $conn->connect_error);
        }

        return $conn;
    }

    /*
    * select
    * run a mysql select statement and return the results
    */
    public function select($sql){
        if(APP_DEBUG) echo 'select()<br>';
        $conn = $this->conn();
        $result = $conn->query($sql);

        // Store the XSS cleaned data
        // XSS = Cross Site Scripting Attack
        $xssArr = array();
       

        if($result->num_rows > 0){
            $x = 0;
            while( $row = $result->fetch_assoc()) {
                //Loop through each column of the current row
                foreach($row as $column => $value){
                    $xssArr[$x][$column] = htmlspecialchars($value, ENT_QUOTES);
                }
                $x++;
            }
        } else {
            $_SESSION['errors'][] = "Error selecting from database: $sql";
        }

        $conn->close();
        return $xssArr;
    }


    /*
    *  execute
    *  @params $sql
    *
    *  Executes sql query
    *  @returns null
    */
    public function execute($sql){
        $conn = $this->conn();
        if($conn->query($sql) !== true){
            echo "Your statement: " . $sql . "<br> Error: ".$conn->error;
            die("Error with the sql statement");
        }
        $conn->close();
    }


    /*
    *  execute_return_id
    *  @params $sql
    *
    *  Executes sql query and returns the last inserted ID
    *  @returns int
    */
    public function execute_return_id($sql) {
        if(APP_DEBUG) echo 'execute_return_id()<br>';
        $conn = $this->conn();
        if(  $conn->query($sql) !== TRUE ) {
            echo "Your statement: " . $sql . "<br> Error: ".$conn->error;
            die("Error with the sql statement");
        }
        $last_id = $conn->insert_id;

        $conn->close();

        return $last_id;
    }
}

?>