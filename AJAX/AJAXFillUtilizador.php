<?php
// dados na base de dados
include_once("../includes/body.inc.php");
$txt = addslashes($_POST['txt']);

$sql = "Select * from users where userName LIKE '%$txt%'";

$result = mysqli_query($con, $sql);

?>



<div class="container about-section about-item client-reviews">

    <table class='table table-striped table-hover' width="100%">
        <tr>
            <th style="color: white">Id</th>
            <th style="color: white">Name</th>
            <th style="color: white">Image</th>
            <th style="color: white">Email</th>
            <th style="color: white" colspan="2" class="centertext">State</th>
            <th style="color: white" colspan="3" class="centertext">Options</th>
        </tr>
        <?php
        while ($dados = mysqli_fetch_array($result)) {
            ?>
            <tr id="<?php echo $dados['userId']; ?>">
                <td data-target="perfilId" style="color: white"><?php echo $dados['userId'] ?></td>
                <td><a href="../perfil.php?id= <?php echo $dados['userId'] ?>" style="color: white"> <?php echo $dados['userName'] ?></td></a>
                <td data-target="perfilImagem" ><img width='100' height="100" src="../<?php echo $dados['userImageURL'] ?>" ></td>
                <td data-target="perfilEmail" style="color: white"><?php echo $dados['userEmail'] ?></td>
                <td data-target="perfilEstado" style="color: white"><?php echo $dados['userEstate'] ?></td>
                <td data-target="perfilEstado" style="color: white"><?php echo $dados['usersAdmin'] ?></td>
                <?php
                if ($dados['userEstate'] == 'Disable'){
                    ?>
                    <td><a href="ativarUtilizador.php?id=<?php echo $dados['userId'];?>"> Enable </a></td>
                    <?php
                } else if ($dados['userEstate'] == 'Enable') {
                    ?>
                    <td><a href="desativarUtilizador.php?id=<?php echo $dados['userId'];?>"> Disable</a></td>
                    <?php
                }
                if ($dados['usersAdmin'] == 'User'){
                    ?>
                    <td><a href="ativarAdmin.php?id=<?php echo $dados['userId'];?>"> Make Admin </a></td>
                    <?php
                } else if ($dados['usersAdmin'] == 'admin') {
                    ?>
                    <td><a href="desativarAdmin.php?id=<?php echo $dados['userId'];?>"> Make User</a></td>
                    <?php
                }
                ?>
                <td><a onclick="DeleteUtilizador(<?php echo $dados['userId'];?>)"> <i class="fa fa-trash  text-danger"></i></a></td>

            </tr>
            <?php
        }
        ?>
    </table>

</div>