<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
</style>
<?php
include '../../database/database.php';
$sql = "SELECT productId from stk_outgoing";
$execute = mysqli_query($connection, $sql);
while($result = mysqli_fetch_assoc($execute)) {
    $productId = $result['productId'];
    $query2 = "SELECT product_Name from stk_products ";
    $execute2 = mysqli_query($connection, $query2);
    $result2 = mysqli_fetch_assoc($execute2);
    $productName = $result2['product_Name'];
}
/*
$query=mysqli_query($connection,$sql);
?>
<table>
    <tr><th>product name</th> <th>Quantity</th></tr>
    <?php
while($row= mysqli_fetch_assoc($query)){?>
    <tr>
<td><?=$row["product_Name"]?></td>
<td><?=$row["quantity"]?></td>
    </tr>
<?php }?>
</table>
*/