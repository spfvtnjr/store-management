<?php
require "./../connection.php";
$qty=$_POST["quantity"];
$id=$_POST["productName"];
$query = mysqli_query($connection, "INSERT INTO stk_inventory(quantity, productId) VALUES('$qty', '$id')");

if(!$query){
    echo "Couldn't save inventory".mysqli_error();
}
else{
    echo "Inventory successfully added";
}
?>