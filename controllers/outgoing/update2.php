<?php
include '../../database/database.php';
$outgoingId=$_POST["outgoing_id"];
$productId=$_POST["pname"];
$quantity=$_POST["quantity"];
    $sql="UPDATE  stk_outgoing SET productId='$productId',quantity='$quantity'WHERE outgoingId='$outgoingId';";
    $update= mysqli_query($connection,$sql);
    if($update){
      echo "<h1> Product Updated successfully</h1>";
      echo "<a href=display.php>Display</a>";
    }else{
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
?>