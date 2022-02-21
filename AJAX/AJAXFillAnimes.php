<?php
include_once("../includes/body.inc.php");
$txt = addslashes($_POST['txt']);
$sql = "Select * from Anime where animeName LIKE '%$txt%'";

$result = mysqli_query($con, $sql);

?>

<div class="container">

    <table class="table table-striped table-hover">
        <tr>
            <td colspan="6" align='right'>
                <a href="novoAnime.php"><i style="color: white"> Add</i></a>
            </td>
        </tr>
        <tr>
            <th style="color: white">Id</th>
            <th style="color: white">Name</th>
            <th style="color: white">Japanese Name</th>
            <th style="color: white">Image</th>
            <th colspan="2" class="centertext" style="color: white">Options</th>
        </tr>
        <?php
        while ($dados = mysqli_fetch_array($result)) {
            ?>

            <tr id="<?php echo $dados['animeId']; ?>">
                <td data-target="animeId" style="color: white"><?php echo $dados['animeId'] ?></td>
                <td> <a href="../anime-details.php?id=<?php echo $dados['animeId']?>" style="color: white" ><?php echo $dados['animeName'] ?></td></a>
                <td> <a href="../anime-details.php?id=<?php echo $dados['animeId']?>" style="color: white" ><?php echo $dados['animeJapaneseName'] ?></td></a>
                <td data-target="animeImagem"><img width='100' height="100" src="../<?php echo $dados['animeImagemURL'] ?>"></td>
                <td><a onclick="editaAnime(<?php echo $dados['animeId'];?>)" ><i
                            class="fa fa-edit text-primary"></i></a></td>
                <td><a onclick="eliminaAnime(<?php echo $dados['animeId'];?>)"> <i class="fa fa-trash  text-danger"></i></a></td>
            </tr>
            <?php
        }
        ?>


    </table>
