<?php
$host='localhost';
$user='root';
$password='*souvenir#';
$database='store_management_system';
$connection=mysqli_connect($host,$user,$password,$database);
if (!$connection) {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

?>