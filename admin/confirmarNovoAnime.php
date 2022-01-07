<?php
include_once("../includes/body.inc.php");


$idCategoria =intval($_POST['categoria']);

$animeName = addslashes($_POST['nomeEng']);
$animeJap = addslashes($_POST['nomeJap']);
$animeSin = $_POST['reviewTexto'];

$logo = $_FILES['image']['name'];
$fundo = $_FILES['Fimage']['name'];


$novoNome="imagens/".$logo;
$novoNome1="imagens/".$fundo;

$novoNomeCopia="../imagens/".$logo;
$novoNomeCopia1="../imagens/".$fundo;


copy($_FILES['image']['tmp_name'],$novoNomeCopia);
copy($_FILES['Fimage']['tmp_name'],$novoNomeCopia1);


$sql = "insert into anime (animeId,animeName,animeImagemURL,animeJapaneseName,animeSinopse,animeFirstImageURL) 
                    values (0,'".$animeName."','".$novoNome."','".$animeJap."','".$animeSin."','".$novoNome1."') ";


mysqli_query($con, $sql);
$idEst=mysqli_insert_id($con); // último Id criado pelo Insert

$sql1 ="insert into animecategorias (animeCategoriaId, categoriaAnimeId) values ('".$idCategoria."','".$idEst."')";
mysqli_query($con, $sql1);
//header("location:../anime-details.php?id=$idEst");
?>