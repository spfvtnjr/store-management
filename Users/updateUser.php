<?php
session_start();
if(!$_SESSION['userid']){
    header("Location:login.php");
 }
require "./../connection.php";
$Id = $_GET["Id"];
$user = mysqli_query($connection, "SELECT * FROM stk_users WHERE userId='$Id'");
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
            width: 10em;
            padding: 5px;
            background-color: rgb(0, 53, 83);
            font-weight: 500;
            color: #000;
            border-color: #000;
            font-size: medium;
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
$countries = "SELECT * FROM db_rca.countries";
$execute = mysqli_query($connection, $countries);
?>
<body>
    <div class="main">
        <form action="./userUpdate.php" method="POST">
            <h2>Join Us</h2>
            <?php
            while($row = mysqli_fetch_assoc($user)){}
            ?>
            <label for="fname" class="labels fname">First Name</label>
            <input type="text" name="firstName" class="fname fields" id="fname" placeholder="Enter your first name" min="2" max="100" value="<?=$row['firstName']?>"><br>
            <label for="lname" class="labels lname">Last Name</label>
            <input type="text" name="lastName" class="lname fields" id="lname" placeholder="Enter your last name" min="2" max="100" value="<?=$row['lastName']?>"><br>
            <label for="phone" class="labels phone">Telephone</label>
            <input type="number" name="telephone" class="phone fields" id="phone" placeholder="Enter your phone number" value="<?=$row['telephone']?>"><br>
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
                while($rows = mysqli_fetch_assoc($execute)){?>
                <option value="<?=$rows['countryID']?>"><?=$rows['countryName']?></option>
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