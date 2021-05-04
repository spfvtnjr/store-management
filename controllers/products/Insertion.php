<?php
include '../../database/database.php';
$pname=$_POST["pname"];
$brand=$_POST["brand"];
$supphone=$_POST["supphone"];
$supname=$_POST["supname"];
$sql="insert into stk_products (product_Name,brand,supplier_phone,supplier) values('$pname','$brand','$supphone','$supphone')";
$insertQuery=mysqli_query($connection,$sql);
    if($insertQuery){
        echo "data added successfully";
        echo "<p> View all the products </p><a href=display.php>Display</a>";
    }
    else{
        echo "Error: " . $sql . "<br>" . $connection->error;
     }
?>