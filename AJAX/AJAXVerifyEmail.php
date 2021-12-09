<?php
include_once("../includes/body.inc.php");

$txt= addslashes($_POST['txt']);
$sql = "select userEmail from users where userEmail='$txt'";
$resultado = mysqli_query($con, $sql);
echo mysqli_affected_rows($con);
?>

