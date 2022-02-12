<?php
require_once "constants.php";
session_start();

class config{  
    public $conn;  
    public $error;
    private $hostname   = HOST; //"localhost";
    private $username   = USER; //"root"
    private $password   = PASS; //
    private $dbname     = DBNAME; //"student_db";

    public function __construct()  
    {  
        
        $this->conn = new mysqli($this->hostname, $this->username, $this->password,  $this->dbname);
        
        // Check connection
        if ($this->conn->connect_error) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            die;
        }
        return true;
    }  
}  