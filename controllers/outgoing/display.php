
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles/styles.css">
    <link rel="stylesheet" href="../styles.css">
    <title>Document</title>
</head>
<style>
#navigation-button {
    background-color: #0d1d40;
    color: white;
    width: 150px;
    height: 41px;
    float: right;
    text-decoration: none;
    display: grid;
    margin: 28px;
    line-height: 41px;
    text-align: center;
    }
</style>
<body>
<nav>
        <h3 id="logo">STORE MS</h3>
        <input type="checkbox" id="check">
        <label for="check" class="menu-icon"><i class="ri-menu-2-line"></i></label>
        <ul class="nav-links">
            <li class="nav-item"><a href="../users/Display.php" id="active">users</a></li>
            <li class="nav-item"><a href="../products/Display.php">Products</a></li>
            <li class="nav-item"><a href="../inventory/Display.php">Inventory</a></li>
            <li class="nav-item"><a href="../outgoing/Display.php">Outgoing</a></li>
        </ul>
</nav>
<br>
<br>
<a href="../../views/outgoing.php" id="navigation-button">Add to outgoing</a>
<h3 id="title">All outgoings as in the database</h3>
<div style="overflow-x:auto">
    <table>
    <tr>
    <th>No</th>
    <th>product name</th>
    <th>Quantity</th>
    <th>Update</th>
    <th>Delete</th>
    </tr>
    <?php
    include '../../database/database.php';
    $sql="select p.product_Name,o.outgoingId,o.productId,o.quantity from stk_products P INNER JOIN stk_outgoing o ON p.productID=o.productId;";
    $query=mysqli_query($connection,$sql) or die("Error".mysqli_error($connection));
    while ($row=mysqli_fetch_assoc($query)) {?>
    <tr>
        <td><?=$row['outgoingId']?></td>
        <td><?=$row['product_Name']?></td>
        <td><?=$row['quantity']?></td>
       <td><a href='update.php?outgoingId=<?=$row["outgoingId"]?>'  id="update-btn">Update</a></td>
        <td><a href='Delete.php?outgoingId=<?=$row["outgoingId"]?>' id="delete-btn">Delete</a></td>
    </tr>
    <?php } ?>
    </table>
</div>
</body>
</html>