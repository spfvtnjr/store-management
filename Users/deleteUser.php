<?php
session_start();
if(!$_SESSION['userid']){
    header("Location:login.php");
 }
require "./../connection.php";
$Id = $_GET["Id"];
$deleteUser = mysqli_query($connection, "DELETE FROM stk_users WHERE userId='$Id'");
if(!$deleteUser){
    echo "Couldn't delete".mysqli_error();
}
else{
    echo "User deleted successfully";
    require "./displayUser.php";
}
?>

