<?php
$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$telephone = $_POST["telephone"];
$gender = $_POST["gender"];
$nationality = $_POST["nationality"];
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];

require "./../connection.php";

    $sqlInsert = "INSERT INTO stk_users(firstName, lastName, telephone, gender, nationality, username, email, passwd) VALUES('$firstName','$lastName', '$telephone', '$gender', '$nationality', '$username', '$email', '$password')" ;
    $execute = mysqli_query($connection, $sqlInsert);
    if($execute){
       require "./displayUser.php";
    }
    else{
        echo "Couldn't save".mysqli_error();
    }
?>