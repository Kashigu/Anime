<?php
session_start();
include_once("../includes/body.inc.php");




$animeName = addslashes($_POST['nomeEng']);
$animeJap = addslashes($_POST['nomeJap']);
$animeSin = $_POST['reviewTexto'];
$animeTotal = intval($_POST['totalEp']);

$logo = $_FILES['image']['name'];
$fundo = $_FILES['Fimage']['name'];


$novoNome="imagens/".$logo;
$novoNome1="imagens/".$fundo;

$novoNomeCopia="../imagens/".$logo;
$novoNomeCopia1="../imagens/".$fundo;


copy($_FILES['image']['tmp_name'],$novoNomeCopia);
copy($_FILES['Fimage']['tmp_name'],$novoNomeCopia1);


$sql = "insert into anime (animeId,animeName,animeImagemURL,animeJapaneseName,animeSinopse,animeFirstImageURL,animeTotalEpisodes) 
                    values (0,'".$animeName."','".$novoNome."','".$animeJap."','".$animeSin."','".$novoNome1."','".$animeTotal."') ";


mysqli_query($con, $sql);
$idEst=mysqli_insert_id($con); // último Id criado pelo Insert


    $idCategoria = $_POST['categoria'];


    foreach ($idCategoria as $categoria){

        $sql1 ="insert into animecategorias (animeCategoriaId, categoriaAnimeId) values ('".$categoria."','".$idEst."')";
        mysqli_query($con, $sql1);
    }

header("location:../anime-details.php?id=$idEst");
?>