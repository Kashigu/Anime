<?php
// dados na base de dados
include_once("../includes/body.inc.php");
$categoria = $_POST['categoriaName'];
$id = $_POST['categoria'];


$sql ="UPDATE Categorias set categoriaName='".$categoria."' where categoriaId='$id'";

$result = mysqli_query($con, $sql);
$dados=mysqli_fetch_array($result);
?>
