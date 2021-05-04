<?php
include '../../database/database.php';
   $outgoingId=$_GET["outgoingId"];
    $sql="DELETE FROM  stk_outgoing WHERE outgoingId='$outgoingId';";
    $delete= mysqli_query($connection,$sql);
    if($delete){
      echo "<h1> Data deleted successfully!</h1>";
      echo "<a href=display.php>Display</a>";
    }else{
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
?>