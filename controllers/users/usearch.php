<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
</style>
<?php
    include '../../database/database.php';
    $username=$_POST["username"];
    $query=mysqli_query($connection,"select * from stk_users where username='$username'") or die("Error: " . $query . "<br>" . $connection->error);
if($row= mysqli_fetch_assoc($query)){?>
<table>
    <tr><th>No</th> <th>First name</th> <th>Lastname</th> <th>Gender</th> <th>Nationality</th> <th>Email</th> <th>username</th>
    </tr>
    <tr>
<td><?=$row["userId"]?></td>
<td><?=$row["firstName"]?></td>
<td><?=$row["lastName"]?></td>
<td><?=$row["gender"]?></td>
<td><?=$row["nationality"]?></td>
<td><?=$row["email"]?></td>
<td><?=$row["username"]?></td>    
</tr>
</table>
    <?php }
    else{?>
        <h2> The  user with the username you are searching does not exist our database</h2>
    <?php } ?>