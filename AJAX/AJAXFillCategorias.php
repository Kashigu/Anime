<?php
include_once("../includes/body.inc.php");
$txt = addslashes($_POST['txt']);
$sql = "Select * from Categorias where categoriaName LIKE '%$txt%'";

$result = mysqli_query($con, $sql);

?>

<div class="container">

    <table class="table table-striped table-hover">
        <tr>
            <td colspan="5" align='right'>
                <a data-toggle="modal" data-target="#adicionar"><i style="color: white"> Add</i></a>
            </td>
        </tr>
        <tr>
            <th style="color: white">Id</th>
            <th style="color: white">Name</th>
            <th colspan="2" class="centertext" style="color: white">Options</th>
        </tr>
        <?php
        while ($dados = mysqli_fetch_array($result)) {
            ?>

            <tr id="<?php echo $dados['categoriaId']; ?>">
                <td data-target="animeId" style="color: white"><?php echo $dados['categoriaId'] ?></td>
                <td data-target="animeName" style="color: white"><?php echo $dados['categoriaName'] ?></td>
                <td><a onclick="editaCategorias(<?php echo $dados['categoriaId'];?>)" ><i
                            class="fa fa-edit text-primary"></i></a></td>
                <td><a onclick="eliminaCategorias(<?php echo $dados['categoriaId'];?>)"> <i class="fa fa-trash  text-danger"></i></a></td>
            </tr>
            <?php
        }
        ?>


    </table>
