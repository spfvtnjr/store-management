<style>
    body{
        background-color: rgb(0, 53, 83);
    }
    h2{
        font-family: sans-serif;
        text-align:center;
    }
    .links{
        display: inline-block;
    }
    a{
        color: #fff;
        text-decoration: none;
        font-family: sans-serif;
        text-align:center;
    }
</style>
<?php
require "./../connection.php";
$id = $_GET['Id'];
$deleteQuery = mysqli_query($connection, "DELETE FROM stk_products WHERE productId='$id'");
if(!$deleteQuery){
    echo "Couldn't delete".mysqli_error();
}
else{ ?>
<h2>Data deleted successfully</h2>
<div class="links">
   <a href='./displayProduct.php'>See all products</a><br><br>
   <a href='./../Incoming_products/displayInventory.php'>See inventories</a>
   <a href="./../home.html">Back to home</a>
</div>
<?php }?>