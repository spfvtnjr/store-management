<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:./../Users/login.php");
 }
 $userId=$_SESSION['userId'];
require "./../connection.php";
$product= $_POST["productName"];
$quantity = $_POST["quantity"];
$query = mysqli_query($connection, "INSERT INTO stk_outgoing(productId,quantity,userId) VALUES('$product', '$quantity',' $userId')");
if(!$query){
    echo "Couldn't register the outgoing product".mysqli_error();
}
else{
    echo "Outgoing registered successfully";
    require "./displayOutgoing.php";
}
?>