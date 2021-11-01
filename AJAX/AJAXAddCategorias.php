<?php
// dados na base de dados
include_once("../includes/body.inc.php");
$categoria = addslashes($_POST['categoria']);
$sql ="INSERT INTO Categorias VALUES (0,'".$categoria."')";
$result = mysqli_query($con, $sql);
?>
