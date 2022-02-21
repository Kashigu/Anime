<?php
session_start();
include_once("includes/body.inc.php");

$id=intval($_POST['id']);
$EpisodeName = addslashes($_POST['nomeEng']);
$EpisodeJap = addslashes($_POST['nomeJap']);
$EpisodeTipe = addslashes($_POST['episodeTipe']);
$EpisodeNumber = intval($_POST['episodeNumber']);

echo "<pre>";
print_r($_FILES['episodeURL']);

$video_name = $_FILES['episodeURL']['name'];
$video_name = $_FILES['episodeURL']['name'];
$logo = $_FILES['episodeURL']['name'];
$logotmp = $_FILES['episodeURL']['tmp_name'];

$novoNome="videos/".$logo;

move_uploaded_file($logotmp,$novoNome);


/*$sql = "insert into episodios (episodioId,episodioName,episodioNameJap,episodioURL,episodioAnimeId,episodioNr,episodioTipe)
                    values (0,'".$EpisodeName."','".$EpisodeJap."','".$novoNome."','".$id."','".$EpisodeNumber."','".$EpisodeTipe."') ";
*/

mysqli_query($con, $sql);

//header("location:episodesList.php?id=$id");
?>