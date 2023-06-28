<?php
 
$con = "";
  
$servername = "localhost";
$user = "root";
$dbpass = "";
$dbname = "todo_db";
$conn = mysqli_connect($servername, $user, $dbpass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
?>