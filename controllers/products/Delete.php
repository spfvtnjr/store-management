<?php
include '../../database/database.php';
   $productId=$_GET["productId"];
    $sql="DELETE FROM  stk_products WHERE productId='$productId';";
    $delete= mysqli_query($connection,$sql);
    if($delete){
      echo "<h1> Data deleted successfully!</h1>";
      echo "<a href=display.php>Display</a>";
    }else{
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
?>