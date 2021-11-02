<?php
// dados na base de dados
include_once("../includes/body.inc.php");
$id=intval($_POST['idAnime']);
$sql="Select * from anime where animeId=$id";

$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
echo $dados['animeName'];
?>
