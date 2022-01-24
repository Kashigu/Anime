<?php
include_once("../includes/body.inc.php");
$id = intval($_POST['id']);
$txt = addslashes($_POST['txt']);
$sql = "Select * from episodios where episodioAnimeId = '$id' and episodioName LIKE '%$txt%'";

$result = mysqli_query($con, $sql);

?>

<div class="container">

    <table class="table table-striped table-hover">
        <tr>
            <td colspan="6" align='right'>
                <a href="novoEpisode.php"><i style="color: white"> Add</i></a>
            </td>
        </tr>
        <tr>
            <th style="color: white">Id</th>
            <th style="color: white">Episode Name</th>
            <th style="color: white">Episode Number</th>
            <th style="color: white">EpisodeURL</th>
            <th colspan="2" class="centertext" style="color: white">Options</th>
        </tr>
        <?php
        while ($dados = mysqli_fetch_array($result)) {
            ?>

            <tr id="<?php echo $dados['episodioId']; ?>">
                <td style="color: white"><?php echo $dados['episodioId'] ?></td>
                <td style="color: white"><?php echo $dados['episodioName'] ?></td>
                <td style="color: white"><?php echo $dados['episodioNr'] ?></td>
                <td style="color: white"><?php echo $dados['episodioURL'] ?></td>
                <td><a onclick="editaEpisodes(<?php echo $dados['episodioId'];?>)" ><i
                            class="fa fa-edit text-primary"></i></a></td>
                <td><a onclick="eliminaEpisodes(<?php echo $dados['episodioId'];?>)"> <i class="fa fa-trash  text-danger"></i></a></td>
            </tr>
            <?php
        }
        ?>


    </table>
