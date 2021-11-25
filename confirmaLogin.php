<?php
include_once("includes/body.inc.php");

$email=$_POST['email'];
$email= lcfirst($email);
$password= addslashes($_POST['password']);
$password=md5($password);

$sql="select userId from users where userEmail='$email' AND userEstate='Enable'";
$res=mysqli_query($con,$sql);
$dados=mysqli_fetch_array($res);
$id=$dados['userId'];



$sql2="select * from users where userId='$id'";
// buscar dados
$res2=mysqli_query($con,$sql2);
$dados2=mysqli_fetch_array($res2);



if($password == $dados2['userPass'] AND $email == $dados2['userEmail'] and $dados2['userAdmin']=='User' ) {
    session_start();
    $_SESSION['id'] = $dados['userId'];
    $_SESSION['nome'] = $dados['userName'];
    $_SESSION['email'] = $dados['userEmail'];
    header("location:index.php");


}elseif($password == $dados2['userPass'] AND $email == $dados2['userEmail'] and $dados2['userAdmin']=='Admin' ) {
    session_start();
    $_SESSION['id'] = $dados['userId'];
    $_SESSION['nome'] = $dados['userName'];
    $_SESSION['email'] = $dados['userEmail'];
    header("location:admin/index.php");
}
?>

