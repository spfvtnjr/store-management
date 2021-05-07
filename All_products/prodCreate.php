<?php
session_start();
$productName = $_POST['productName'];
$brand = $_POST['brand'];
$supplier = $_POST['supplier'];
$telephone = $_POST['telephone'];
$userId=$_SESSION['userId'];
require "./../connection.php";
if(!$connection){
   echo 'Connection failed'.mysqli_connect_error();
}
$query = "INSERT INTO stk_products(product_Name, brand, supplier_phone, supplier,userId) VALUES ('$productName', '$brand', '$telephone', '$supplier','$userId');";
$exec = mysqli_query($connection, $query);
if(!$exec){
    echo "Could not save the product";
}
else{
    require "./displayProduct.php";
}
?>