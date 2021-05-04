<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updating product</title>
</head>
<style>
        * {
            font-family: "poppins";
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        body {
            background-color: #36a0f5;
            width: 100%;
        }

        html,
        body {
            max-width: 100%;
            overflow-x: hidden;
        }

        h2 {
            text-align: center;
            color: #36a0f5;
        }

        label {
            color: gray;
            width: 20%;
            display: inline-block;
        }

        form {
            background-color: #ffffff;
            width: 45%;
            border-radius: 5px;
            margin: auto;
            padding: 20px 60px;
        }

        input[type=text],
        input[type=number],
        input[type="password"],
        select {
            width: 75%;
            height: 40px;
            border-radius: 4px;
            outline: none;
            padding-left: 10px;
            border: 0.5px solid grey;
            display: inline !important;
        }

        div {
            margin: 10px 0;
            vertical-align: middle;
        }

        .check {
            position: relative;
            left: 30%;
            top: -30px;
        }

        .check>label {
            color: gray;
            font-weight: 500;
        }

        input[type=submit] {
            margin-left: 40%;
            width: 30%;
            border-radius: 5px;
            border: none;
            background-color: #36a0f5;
            padding: 7px;
            color: white;
        }

        textarea#message {
            width: 70%;
        }

        @media only screen and (max-width:600px) {

            input[type=text],
            input[type="password"],
            select {
                display: block;
                width: 100%;
                height: 40px;
            }

            select>option {
                width: 40% !important;
            }

            #message {
                display: block;
                outline: none;
            }

            form {
                width: 99%;
                overflow-x: hidden !important;
                padding: 15px;
            }

            .label-class1 {
                display: none
            }

            #message {
                width: 100% !important;
            }

            #file {
                display: inline-block !important;
            }

            #language-label {
                width: 100%;
            }

            .checkbox-label {
                margin-left: 0px !important;
            }

            input [type="checkbox"] {
                display: block;
                margin-left: 0 !important;
            }

            .check {
                left: 0;
                top: 0px;
            }
        }

        @media only screen and (min-width:600px) and (max-width: 768px) {
            form {
                width: 80%;
                overflow-x: hidden !important;
            }
        }

        @media only screen and (min-width:769px) and (max-width: 1200px) {
            form {
                width: 45%;
                overflow-x: hidden !important;
                padding: 20px 60px;
            }

            input[type=text],
            input[type=number],
            input[type="password"],
            select {
                display: block;
                width: 100%;
                height: 40px;
            }
        }
    </style>
<body>
    <div class="container">
    <?php
    include '../../database/database.php';
    $inventory_id=$_GET["inventoryId"];
    $sql="select * from stk_inventory where inventory_id=$inventory_id;";
    $query=mysqli_query($connection,$sql);
    while($row= mysqli_fetch_assoc($query)){
    ?>
     <form method="post" action="update2.php" >
        <h2>Inventory update</h2>
        <div>
        <input type= "hidden" name= "inventory_id" value ="<?php echo $row['inventory_id']?>">
            <label class="label-class1" for="pname">Product name</label>
            <select name="pname" id="pname">
                <option value="<?php echo $row['productId']?>">--select product---</option>
                <?php
                  $ProductsQuery=mysqli_query($connection,"select * from stk_products");
                  if($ProductsQuery){
                    while ($row=mysqli_fetch_assoc($ProductsQuery)) {?>
                       <option value="<?php echo $row["productId"] ?>"><?=$row["product_Name"]?></option>
                    <?php } }?>
</select>
        </div>
        <div>
            <label class="label-class1" for="quantity">Quantity</label>
            <input required type="text" name="quantity" id="quantity" value="<?php echo $row['quantity']?>" placeholder="Enter product quantity" required />
        </div>
        <input type="submit" value="update inventory">
        </div>
    </form>
    <?php }
    ?>
</body>
</html>