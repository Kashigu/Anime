<?php
include_once("../includes/body.inc.php");

$userId=$_POST['user'];

$sql="delete from users where userId='".$userId."'";


$result = mysqli_query($con,$sql);



?>
