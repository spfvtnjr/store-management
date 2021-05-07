<?php
session_start();
if(!$_SESSION['userId']){
    header("Location:login.php");
 }
require "./../connection.php";
$Id = $_GET["Id"];
$sql="SELECT * FROM stk_users WHERE userId='$Id'";
$updateUser = mysqli_query($connection,$sql);
?>
<head>
 <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: rgb(0, 53, 83);
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
            line-height: 2.5em;
            background-color: rgb(0, 53, 83);
            font-weight: 500;
            color: #fff;
            border: 2px solid #fff;
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
     
    </style>
</head>
<?php
require "./../connection.php";
$countries = "SELECT countryName, nationality FROM countries, stk_users WHERE countries.countryID = stk_users.nationality";
$execute = mysqli_query($connection, $countries);
?>
<body>
    <div class="main">
        <form action="./userUpdate.php" method="POST">
            <h2>Update User</h2>
            <?php
            while($row=mysqli_fetch_assoc($updateUser)){
            ?>
            <label for="fname" class="labels fname">First Name</label>
            <input type="text" name="firstName" class="fname fields" id="fname" min="2" max="100" value="<?=$row['firstName']?>"><br>
            <label for="lname" class="labels lname">Last Name</label>
            <input type="text" name="lastName" class="lname fields" id="lname"  min="2" max="100" value="<?=$row['lastName']?>"><br>
            <label for="phone" class="labels phone">Telephone</label>
            <input type="number" name="telephone" class="phone fields" id="phone" value="<?=$row['telephone']?>"><br>
            <label for="gender" class="labels gender fields">Gender</label>
            <?php
                if($row["gender"]="male"){
            ?>
                <input type="radio" class="special gender fields"  value="male" name="gender" id="male" checked>
                <label for="male">Male</label>
                <input type="radio" class="special gender fields" value="female" name="gender" id="female">
                <label for="female">Female</label><br>
            <?php }
            else{?>
                <input type="radio" class="special gender fields"  value="male" name="gender" id="male">
                <label for="male">Male</label>
                <input type="radio" class="special gender fields" value="female" name="gender" id="female" checked>
                <label for="female">Female</label><br>
            <?php }
                
            ?>
            <label for="nation" class="labels">Nationality</label>
            <select name="nationality" id="nation">
                <option value="0">Select your nationality</option>
                <!-- <option value="1">Rwandese</option>
                <option value="2">English</option>
                <option value="3">American</option> -->
            <?php
                while($rows = mysqli_fetch_assoc($execute)){?>
                <option value="<?=$rows['countryID']?>"><?=$rows['countryName']?></option>
                <?php } ?>
            </select><br>
            <label for="username" class="labels">Username</label>
            <input type="text" name="username" class="fields" id="username" value="<?=$row['username']?>" readonly><br>
            <label for="mail" class="labels">Email</label>
            <input type="email" name="email" class="fields" id="mail" value="<?=$row['email']?>" readonly><br>
            <label for="passwd" class="labels">Old Password</label>
            <input type="password" name="oldPassword" class="fields" id="passwd" title="Give old password"><br>
            <label for="newpasswd" class="labels">New Password</label>
            <input type="password" name="newPassword" class="fields" id="newpasswd" title="New password"><br>
            <label for="cnewpassword" class="labels">Confirm Password</label>
            <input type="password" name="cnewPassword" class="fields" id="cnewpasswd" title="Confirm new password"><br>
            <?php 
                }
            ?>
            <input type="submit" value="Register">
        </form>
    </div>
</body>