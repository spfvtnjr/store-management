<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>create account</title>
</head>
<style>
/* navbar styling */
nav {
    background-color: #0d1d40;;
    height: 60px;
    width: 100%;
}

nav ul {
    float: right;
    width: 70%;
    position: relative;
    height: 60px;
    text-align:end;
}
nav ul li {
    display: inline-block;
    line-height: 60px;
    margin: 0 20px;
    left: 36em;
}

nav ul li a {
    color: white;
    text-decoration: none;
    font-size: 17px;
}

nav ul li a:hover {
    text-decoration: underline;
}

.menu-icon {
    float: right;
    color:white;
    font-size: 30px;
    line-height: 60px;
    margin-right: 1px;
    cursor: pointer;
    display: none;
}

#check {
    display: none;
}

#logo{
float: left;
line-height: 60px;
color:white;
}
@media only screen and (max-width:740px) {
    nav ul li a {
        font-size: 20px;
    }

    .menu-icon {
        display: inline-block;
    }

    nav ul.nav-links {
        width: 100%;
        height: 270px;
        position: absolute;
        top: 60px;
        background-color: #0d1d40;
        left: -100%;
        border-radius: 0;
        transition: all .5s;
    }

    nav ul li {
        display: block;
        text-align: center;
    }

    #check:checked~ul.nav-links {
        left: 0 !important;
    }

    .nav-items {
        margin-left: 0;
    }
}

@media only screen and (min-width:740px) {
    .nav-items {
        text-align: end;
    }
}</style>
<body>
<nav>
        <h3 id="logo">STORE MS</h3>
        <input type="checkbox" id="check">
        <label for="check" class="menu-icon"><i class="ri-menu-2-line"></i></label>
        <ul class="nav-links">
            <li class="nav-item"><a href="../controllers/users/Display.php" id="active">users</a></li>
            <li class="nav-item"><a href="../controllers/products/Display.php">Products</a></li>
            <li class="nav-item"><a href="../controllers/inventory/Display.php">Inventory</a></li>
            <li class="nav-item"><a href="../controllers/outgoing/Display.php">Outgoing</a></li>
        </ul>
</nav>
    <div class="container">
        <form action="../controllers/users/Insertion.php" method="POST" class="form" enctype="multipart/form-data">
            <h2>Create account</h2>
            <div>
                <label class="label-class1" for="fname">First Name</label>
                <input required type="text" name="fistName" id="fname" placeholder="Enter your first name" required/>
            </div>
            <div>
                <label class="label-class1" for="lname">Last Name</label>
                <input required type="text" name="lastName" id="lname" placeholder="Enter your Last name" required/>
            </div>
            <div>
                <label class="label-class1" for="role" id="role">Nationality</label>
                <select name="role" id="role" required>
                    <option value="">Select user role...</option>
                    <?php
                  include '../database/database.php';
                  $Query=mysqli_query($connection,"select * from roles");
                  if($Query){
                    while ($row=mysqli_fetch_assoc($Query)) {?>
                       <option value="<?php echo $row["roleId"] ?>"><?=$row["role"]?></option>
                    <?php } }?>
                </select>
            </div>
            <div class="form-check">
                <label for="gender">Gender</label>
                <input required type="radio" class="form-check-input" name="gender" value="Male" id="male">
                <label class="form-check-label">Male</label>
                <input required type="radio" class="form-check-input" value="Female" name="gender" id="female">
                <label class="form-check-label"> Female</label>
                                </div>
            <div>
                <label class="label-class1" for="email">Email</label>
                <input required type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="email" id="email" placeholder="Enter your email@gmail.com" required/>
            </div>
            <div>
                <label class="label-class1"  for="phone">Telephone</label>
                <input required type="text"  pattern="^\d{10}$" name="phone" id="phone" placeholder="Enter your phone number" />
            </div>
            <div>
                <label class="label-class1" for="nationality" id="nation">Nationality</label>
                <select name="nationality" id="nationality" required>
                    <option value="">Select Nationality...</option>
                  <?php
                  include '../database/database.php';
                  $countriesQuery=mysqli_query($connection,"select * from countries");
                  if($countriesQuery){
                    while ($row=mysqli_fetch_assoc($countriesQuery)) {?>
                       <option value="<?php echo $row["countryId"] ?>"><?=$row["country_name"]?></option>
                    <?php } }?>
                </select>
            </div>
            <div>
            <div>
                       <label class="label-class1" for="Profile"> Profile Picture</label>
                       <input type="file" name="profile" id="profile" accept="image/*">
                      </div>

                <label class="label-class1" for="username">Username</label>
                <input required type="text" name="username" id="username" placeholder="Enter username" required/>
            </div>
            <div>
                <label class="label-class1" for="password">Password</label>
                <input required type="password" name="password" id="password" placeholder="Enter password" required />
            </div>
            <div>
                <label class="label-class1" for="passwordConfirm">Confirm password</label>
                <input required type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Re-enter password" />
            </div>
            <input type="submit" value="Add user">
    </div>
    </form>
</body>
</html>