<?php
include_once("../includes/body.inc.php");

$animeId=$_POST['anime'];

$sql= "delete from anime where animeId=".$animeId;


$result = mysqli_query($con,$sql);
?>

