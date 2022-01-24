<?php
// dados na base de dados
include_once("../includes/body.inc.php");
$id=intval($_POST['idEpisode']);
$sql="Select * from episodios where episodioId=$id";

$result=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($result);
echo $dados['episodioName'];
?>