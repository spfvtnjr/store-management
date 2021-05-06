<?php
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

if($password!==$cpass){
    echo "Passwords do not match";
}
else{
    $hash= hash("SHA512", $password);
require "./../connection.php";
    $sqlInsert = "INSERT INTO stk_users(firstName, lastName, telephone, gender, roleId, nationality, username, email, passwd) VALUES('$firstName','$lastName', '$telephone', '$gender', '$role', '$nationality', '$username', '$email', '$hash')" ;
    $execute = mysqli_query($connection, $sqlInsert);
    if($execute){
       require "./displayUser.php";
    }
    else{
        echo "Couldn't save".mysqli_error();
    }
}
?>