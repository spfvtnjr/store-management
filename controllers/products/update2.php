<?php
include '../../database/database.php';
$productId=$_POST["productId"];
$pname=$_POST["pname"];
$brand=$_POST["brand"];
$supphone=$_POST["supphone"];
$supname=$_POST["supname"];
    $sql="UPDATE  stk_products SET product_Name='$pname',brand= '$brand',supplier_phone='$supphone',supplier='$supname' WHERE productId='$productId';";
    $update= mysqli_query($connection,$sql);
    if($update){
      echo "<h1> Product Updated successfully</h1>";
      echo "<a href=display.php>Display</a>";
    }else{
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
?>