<?php
include_once("../includes/body.inc.php");

$categoriaId=$_POST['categoria'];

$sql= "delete from Categorias where categoriaId=".$categoriaId;


$result = mysqli_query($con,$sql);
?>

