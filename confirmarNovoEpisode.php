<?php
session_start();
include_once("includes/body.inc.php");

$id=intval($_POST['id']);
$EpisodeName = addslashes($_POST['nomeEng']);
$EpisodeNumber = intval($_POST['episodeNumber']);



$video_name = $_FILES['episodeURL']['name'];
$tmp_name = $_FILES['episodeURL']['tmp_name'];
$video_type = $_FILES['episodeURL']['type'];
$video_error = $_FILES['episodeURL']['error'];

if($video_error===0){
    $video_ex = pathinfo($video_name,PATHINFO_EXTENSION);

    $video_ex_lc= strtolower($video_ex);

    $allowed_exs = array ("mp4","webm","avi","flv");

    if(in_array($video_ex_lc, $allowed_exs)){

    $new_video_name = uniqid("",true).'.'.$video_ex_lc;

    $video_upload_path = "videos/".$new_video_name;
    move_uploaded_file($tmp_name,$video_upload_path);

        $sql = "insert into episodios (episodioId,episodioName,episodioURL,episodioAnimeId,episodioNr,episodioTipe)
                    values (0,'".$EpisodeName."','"."videos/$new_video_name"."','".$id."','".$EpisodeNumber."','".$video_type."') ";

        mysqli_query($con, $sql);
        header("location:episodesList.php?id=$id");
    }else{
        $em = "You can't upload files of this type";
        header("location:novoEpisode.php?id=$id&&error=$em");
    }
}


?>