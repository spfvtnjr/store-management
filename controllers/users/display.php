
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
  input.form-control{
width: 100% !important;
  }
  .form-group{
    margin:20px !important;
  }
</style>
<body>
<nav>
        <h3 id="logo">STORE MS</h3>
        <input type="checkbox" id="check">
        <label for="check" class="menu-icon"><i class="ri-menu-2-line"></i></label>
        <ul class="nav-links">
            <li class="nav-item"><a href="Display.php" id="active">users</a></li>
            <li class="nav-item"><a href="../products/Display.php">Products</a></li>
            <li class="nav-item"><a href="../inventory/Display.php">Inventory</a></li>
            <li class="nav-item"><a href="../outgoing/Display.php">Outgoing</a></li>
        </ul>
</nav>
<!-- new user -->
<a href="../../views/createAccount.php" id="navigation-button"> Add new user</a>
<form action="usearch.php" method="POST">
        <div class="form-group">
          <input type="text" name="username" id="usearch" class="form-control" placeholder="search for a user">
        </div>
        <input type="submit" value='search user'>
    </form>   
<h3 id="title">All users in the database</h3>
<?php
include '../../database/database.php';
$sql="SELECT u.userId,u.firstName,u.lastName,u.telephone,u.filename,u.countryId,u.gender,u.username,u.email,ctr.country_name FROM stk_users u  INNER JOIN countries ctr ON u.countryId=ctr.countryId";
$query=mysqli_query($connection,$sql) or die("Error".mysqli_error($connection));?>
<div style="overflow-x:auto">
<table>
    <tr><th>No</th> <th>First name</th> <th>Lastname</th><th>Telephone</th> <th>Gender</th><th>Nationality</th> <th>Username</th> <th>Email</th><th>profile</th><th>Update</th><th>Delete</th>
    <?php
while($row= mysqli_fetch_assoc($query)){?>
    <tr>
    <?php
    $id=$row["user_id"];
    echo "<tr>";
    echo "<td>".$row['userId']."</td>";
    echo "<td>".$row['firstName']."</td>";
    echo "<td>".$row['lastName']."</td>";
    echo "<td>".$row['telephone']."</td>";
    echo "<td>".$row['gender']."</td>";
    echo "<td>".$row["countryName"]."</td>";
    echo "<td>".$row['username']."</td>";
    echo "<td>".$row['email']."</td>";
    // echo "<td>"."<img src='uploads/".$row["filename"]."'>"."</td>";
    ?>
    <td>
    <a href='update.php?userId=<?=$row["userId"]?>' id="update-btn">Update</a></td>
    <td><a href='Delete.php?userId=<?=$row["userId"]?>' id="delete-btn">Delete</a></td>
    <td><a href='displayImage.php?image=<?=$row["filename"]?>' id="image">view image</a></td>
</tr>
    <?php }?>
</table>
</div>
</body>
</html>