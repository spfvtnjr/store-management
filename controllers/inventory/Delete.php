<?php
include '../../database/database.php';
   $inventory_id=$_GET["inventoryId"];
    $sql="DELETE FROM  stk_inventory WHERE inventory_id='$inventory_id';";
    $delete= mysqli_query($connection,$sql);
    if($delete){
      echo "<h1> Data deleted successfully!</h1>";
      echo "<a href=display.php>Display</a>";
    }else{
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
?>