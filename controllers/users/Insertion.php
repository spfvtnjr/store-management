<?php
include '../../database/database.php';
$firstName=$_POST["fistName"];
$lastName=$_POST["lastName"];
$gender=$_POST["gender"];
$telephone=$_POST["phone"];
$nationality=$_POST["nationality"];
$username=$_POST["username"];
$email=$_POST["email"];
$upassword=$_POST["password"];
$cpassword=$_POST["passwordConfirm"];
$temporary_file_data = $_FILES['profile']['tmp_name'];
$final_filename =  $_FILES['profile']['name'];
if($upassword===$cpassword){
    move_uploaded_file($temporary_file_data, "uploads/" . $final_filename);
    $sql="insert into stk_users(firstname,lastname,gender,telephone,filename,countryId,email,username,password) values('$firstName','$lastName','$gender','$telephone','$final_filename','$nationality','$email','$username','$upassword')";
    $insertQuery=mysqli_query($connection,$sql);
    if($insertQuery){
        echo "data added successfully";
        echo "<a href=display.php>Display</a>";
    }
    else{
        echo "Error: " . $sql . "<br>" . $connection->error;
     }
}
else{
    echo "Passwords do not match. <a href=../../views/accountCreation.php>Go back to form.</a>";
  }
?>