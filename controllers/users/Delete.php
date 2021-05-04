<?php
include '../../database/database.php';
  $user_id=$_GET["userId"];
    $sql="DELETE FROM  stk_users WHERE userId='$user_id';";
    $delete= mysqli_query($connection,$sql);
    if($delete){
      echo "<h1> User deleted successfully!</h1>";
      echo "<a href=display.php>Display</a>";
    }else{
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
?>