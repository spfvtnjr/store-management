<?php 
session_start();
include("../connection.php");
$username = trim($_POST['username']);
$user_password = trim($_POST['password']);
if( ($username =="") || ($user_password =="") ){
echo  "Username and Password are required";
}else{
$hashed =  hash('SHA512',$user_password);
$query="SELECT mu.userId,mu.firstName, mu.lastName,mu.gender,mu.telephone,mu.email,mu.username,r.roleId,r.role from stk_users mu INNER JOIN roles r ON mu.roleId=r.roleId WHERE mu.username='$username' AND mu.passwd='$hashed'";
$check=mysqli_query($connection,$query) or die("unable due to error: ".$connection->error);
if(mysqli_fetch_row($check) == 0){
echo "Invalid Username or Password";
}else{
While(list($userid,$firstName,$lastName,$gender,$telephone,$email,$username,$roleId,$role)=mysqli_fetch_array($check)){
$_SESSION['userid']=$userid;
?>
<div class=”home”>
Welcome <?=$firstName."(".$role.")"?>
<a href="changepassword.php?userid=<?=$userid?>">Change Password</a>
</div>
<?php }}}
?>