<?php
include_once("../includes/body.inc.php");


$email=$_POST['email'];
$password=addslashes($_POST['password']);
$password=md5($password);
$sql="select * from users where userEmail='$email' and userPass='$password' and userEstate='Enable'";
$result=mysqli_query($con,$sql);
echo mysqli_affected_rows($con);
?>

