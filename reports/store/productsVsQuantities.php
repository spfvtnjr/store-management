<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
</style>
<?php
include '../../database/database.php';
$sql='select p.product_Name, i.quantity from stk_products p ,stk_inventory i';
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