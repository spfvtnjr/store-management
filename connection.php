<?php
$host = "localhost";
$user = "root";
$db_password="*souvenir#";
$database = "stock";
$connection = mysqli_connect($host, $user, $db_password, $database);
if(!$connection){
   echo 'Connection failed'.mysqli_connect_error();
}

?>