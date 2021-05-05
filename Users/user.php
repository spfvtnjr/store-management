<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: rgb(0, 53, 83);
            overflow-x: hidden;
            overflow-y: hidden;
        }

        .main{
            background-color: #fff;
            border-radius: 10px;
            width: 40%;
            margin: 3em auto;
            font-family: sans-serif;
            font-size: 1.2em;
        }
        .main *{
            margin-bottom: 10px;
        }
        form{
            padding: 30px 50px;
        }
        h2{
            text-align: center;
        }
        input:not(input[type="submit"], input[type="radio"]), select{
            padding: 10px;
            width: 25em;
        }
        input[type="submit"]{
            height: 2.5em;
            width: 10em;
            padding: 5px;
            background-color: rgb(0, 53, 83);
            font-weight: 500;
            color: #000;
            border-color: #fff;
            border-radius: 5px;
            font-size: medium;
            cursor: pointer;
        }
        /* input, label{
            display: block;
        } */
        .labels{
            width: 25%;
        }
      input[type="email"], input[name="gender"]{
          margin-left: 3em;
      }
      input[type="password"], input[name="telephone"]{
          margin-left: .4em;
      }
     select[id="role"]{
        margin-left: 3.5em;
     }

    .header{
           height: 5em;
           width: 100vw;
           background: #fff;
       }
       ul{
           display: flex;
           gap:1em;
           margin-left: 15em;
       }
       li{
           list-style-type: none;
           line-height: 5em;
       }

       a{
        text-decoration: none;
        color: #rgb(0, 53, 83);
        width: 100%;
        font-weight: 500;
       }
    </style>
</head>
<?php
require "./../connection.php";
$countries = "SELECT * FROM countries";
$execute = mysqli_query($connection, $countries);
$roleExecute=mysqli_query($connection, "SELECT * FROM roles");
?>
<body>
<header>
        <nav class="header">
            <ul>
                <li><a href="./displayUser.php">Display users</a></li>
                <li><a href="./../All_products/allProducts.php">Add product</a></li>
                <li><a href="./../All_products/displayProduct.php">Display products</a></li>
                <li><a href="./../Incoming_products/inventory.php">Register inventory</a></li>
                <li><a href="./../Incoming_products/displayInventory.php">Display inventories</a></li>
                <li><a href="./displayOutgoing.php">Display outgoing products</a></li>
                <li><a href="./../Outgoing_products/outgoingProd.php">Create outgoing</a></li>
            </ul>  
        </nav>
    </header>
    <div class="main">
        <form action="userCreate.php" method="POST" enctype="multipart/form-data">
            <h2>Add User</h2>
            <label for="fname" class="labels fname">First Name</label>
            <input type="text" name="firstName" class="fname fields" id="fname" placeholder="Enter your first name" min="2" max="100"><br>
            <label for="lname" class="labels lname">Last Name</label>
            <input type="text" name="lastName" class="lname fields" id="lname" placeholder="Enter your last name" min="2" max="100"><br>
            <label for="phone" class="labels phone">Telephone</label>
            <input type="number" name="telephone" class="phone fields" id="phone" placeholder="Enter your phone number"><br>
            <label for="gender" class="labels gender fields">Gender</label>
            <input type="radio" class="special gender fields"  value="male" name="gender" id="male" checked>
            <label for="male">Male</label>
            <input type="radio" class="special gender fields" value="female" name="gender" id="female">
            <label for="female">Female</label><br>
            <label for="nation" class="labels">Nationality</label>
            <select name="nationality" id="nation">
                <option value="0">Select your nationality</option>
                <!-- <option value="1">Rwandese</option>
                <option value="2">English</option>
                <option value="3">American</option> -->
            <?php
                while($rows = mysqli_fetch_array($execute)){?>
                <option value="<?=$rows['countryID']?>"><?=$rows['countryName']?></option>
                <?php } ?>
            </select><br>
            <label for="role" class="labels">Roles</label>
            <select name="roles" id="role">
                <option value="0">Select role</option>
                <!-- <option value="1">Rwandese</option>
                <option value="2">English</option>
                <option value="3">American</option> -->
            <?php
                while($rows = mysqli_fetch_array($roleExecute)){?>
                <option value="<?=$rows['roleId']?>"><?=$rows['role']?></option>
                <?php } ?>
            </select><br>
            <label for="username" class="labels">Username</label>
            <input type="text" name="username" class="fields" id="username" placeholder="Enter your username"><br>
            <label for="mail" class="labels">Email</label>
            <input type="email" name="email" class="fields" id="mail" placeholder="Enter a valid email"><br>
            <label for="passwd" class="labels">Password</label>
            <input type="password" name="password" class="fields" id="passwd" placeholder="Enter your password"><br>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>