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
<!-- Outgoing products -->  
<form method="post" action="../controllers/outgoing/Insertion.php">
        <h2>Outgoing products</h2>
        <div>
            <label class="label-class1" for="pname">Product name</label>
<select name="pname" id="pname" required>
<option value="">--select product---</option>
                <?php
                 include '../database/database.php';
                  $ProductsQuery=mysqli_query($connection,"select * from stk_products");
                  if($ProductsQuery){
                    while ($row=mysqli_fetch_assoc($ProductsQuery)) {?>
                       <option value="<?php echo $row["productId"] ?>"><?=$row["product_Name"]?></option>
                    <?php } }?>
</select>
        </div>
        <div>
            <label class="label-class1" for="quantity">Quantity</label>
            <input required type="number" name="quantity" id="quantity" placeholder="Enter product quantity" required />
        </div>
        <input type="submit" value="save outgoing">
        </div>
    </form>  
</body>
</html>