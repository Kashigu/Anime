<?php
// dados na base de dados
include_once("../includes/body.inc.php");
$id=intval($_POST['idUser']);
$sql="Select * from users where userId=$id";

$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
echo $dados['userName'];
?>

