<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:login.php");
 }
 elseif($_SESSION['roleName']!="Manager"){
    header("Location:norights.php");
 }
  
require "./../connection.php";
$Id = $_GET["Id"];
$deleteUser = mysqli_query($connection, "DELETE FROM stk_users WHERE userId='$Id'");
if(!$deleteUser){
    echo "Couldn't delete".mysqli_error($connection);
}
else{
    echo "User deleted successfully";
    require "./displayUser.php";
}
?>

