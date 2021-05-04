<?php
include '../../database/database.php';
$inventory_Id=$_POST["inventory_id"];
$productId=$_POST["pname"];
$quantity=$_POST["quantity"];
    $sql="UPDATE  stk_inventory SET productId='$productId',quantity= '$quantity'WHERE inventory_id='$inventory_Id';";
    $update= mysqli_query($connection,$sql);
    if($update){
      echo "<h1> Product Updated successfully</h1>";
      echo "<a href=display.php>Display</a>";
    }else{
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
?>