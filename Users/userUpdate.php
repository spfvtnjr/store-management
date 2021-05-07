<?php
    session_start();
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $telephone = $_POST["telephone"];
    $gender = $_POST["gender"];
    $roles=$_POST["role"];
    $nationality = $_POST["nationality"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $oldPassword = $_POST["oldPassword"];
    $newPassword=$_POST["newPassword"];
    $cnewpass=$_POST['cnewPassword'];

    include("./../connection.php");
    if(!$oldPassword==$_SESSION["password"]){
            echo "Wrong password";
            header('Location:./login.php');
        }
    else{
        if($newPassword!=$cnewpass){
            echo "Passwords should match";
        }
        else{
            $hashNewPassword=hash('SHA512', $newPassword);
            $updatingQuery=mysqli_query($connection, "UPDATE stk_users SET firstName TO '$firstName', lastName TO '$lastName', telephone TO '$telephone', gender TO '$gender', nationality TO '$nationality', email TO '$email', passwd TO '$hashNewPassword'");
            echo "User successfully updated";
            echo $newPassword;
        }
    }
?>