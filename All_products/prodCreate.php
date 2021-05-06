<?php
$productName = $_POST['productName'];
$brand = $_POST['brand'];
$supplier = $_POST['supplier'];
$telephone = $_POST['telephone'];

$host = "localhost";
$user = "root";
$db_password="Borntopraise@10";
$database = "stock";
$connection = mysqli_connect($host, $user, $db_password, $database);

if(!$connection){
   echo 'Connection failed'.mysqli_connect_error();
}
$query = "INSERT INTO stk_products(product_Name, brand, supplier_phone, supplier) VALUES ('$productName', '$brand', '$telephone', '$supplier');";
$exec = mysqli_query($connection, $query);
if(!$exec){
    echo "Could not save the product";
}
else{
    require "./displayProduct.php";
}
?>