<?php
include '../../database/database.php';
$productId=$_POST["pname"];
$quantity=$_POST["quantity"];
    $sql="insert into stk_inventory(quantity,productId) values('$quantity','$productId')";
    $insertQuery=mysqli_query($connection,$sql);
        if($insertQuery){
            echo "Product data added successfully";
            echo "<p> View all the products inventory </p><a href=display.php>Display</a>";
        }
        else{
            echo "Error: " . $sql . "<br>" . $connection->error;
         }
?>