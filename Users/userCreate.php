<?php
session_start();
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$telephone = $_POST["telephone"];
$gender = $_POST["gender"];
$role=$_POST["role"];
$nationality = $_POST["nationality"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$cpass=$_POST['cpassword'];

$_SESSION["password"]=$password;
echo $password;

if($password!==$cpass){
    echo "Passwords do not match";
}
else{
    $hash= hash("SHA512", $password);
    require "./../connection.php";
if($_SESSION['roleName']=="Administrator"){

    $sqlInsert = "INSERT INTO stk_users(firstName, lastName, telephone, gender, roleId, nationality, username, email, passwd) VALUES('$firstName','$lastName', '$telephone', '$gender', '$role', '$nationality', '$username', '$email', '$hash')" ;
        $execute = mysqli_query($connection, $sqlInsert);
        if($execute){
           require "./displayUser.php";
        }
        else{
            echo "Couldn't save".mysqli_error();
        }
}
elseif($_SESSION['roleName']=="Manager"){
    header('Location:./../All_products/allProducts.php');
}
else{
    header('Location:./../Incoming_products/inventory.php');
}
}
?>