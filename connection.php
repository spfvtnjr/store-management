<?php
$host = "localhost";
$user = "root";
$db_password="Borntopraise@10";
$database = "stock";
$connection = mysqli_connect($host, $user, $db_password, $database);
if(!$connection){
   echo 'Connection failed'.mysqli_connect_error();
}

?>