<?php

//Step 1 - Set database connection variables
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "project_database";

//Set 2 - Create a new connectipn using mySQLi
$conn = new mysqli($host, $user, $pass, $dbname);

//Step 3 - Check if the connection failed
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
?>