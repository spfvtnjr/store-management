<?php 
session_start();
// if(!$_SESSION['userId']){
//     header("Location:login.php");
//  }
include("../connection.php");
$username = trim($_POST['username']);
$user_password = trim($_POST['password']);
if( ($username =="") || ($user_password =="") ){
echo  "Username and Password are required";
}else{
$hash=hash("SHA512",$user_password);
$userId=$currentPassword=$roleName=$roleId="";
$query=mysqli_query($connection, "SELECT * FROM stk_users where username='$username'");
while($row=mysqli_fetch_assoc($query)){
    $currentPassword=$row["passwd"];
    $userId=$row["userId"];
    $roleId=$row["roleId"];   
}
$roleQuery=mysqli_query($connection,"SELECT role FROM roles where roleId='$roleId' ");
while($rolesResult=mysqli_fetch_assoc($roleQuery)){
    $roleName=$rolesResult["role"];
}
if(!mysqli_num_rows($query)){
    echo "Invalid username or password";
}
if($hash!=$currentPassword){
   echo "Invalid username or password";
}
else{
    $_SESSION['userId']=$userId;
    $_SESSION['roleName']=$roleName;
    $_SESSION["roleId"]=$roleId;
    header("Location:./../home.php");
}
}
?>