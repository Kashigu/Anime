<?php

include_once("includes/config.inc.php");
$con = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
$nome = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$password = md5(addslashes($_POST['password']));
$Spassword = md5(addslashes($_POST['Conpassword']));


if (isset($password) and isset($Spassword)) {
    if ($password == $Spassword) {

        $sql = "insert into users(userId, userName,userImageURL, userEmail, userEstate, userPass, usersAdmin) values(0,'$nome','imagens/user.png','$email','Enable','$Spassword','User')";
        $result = mysqli_query($con, $sql);
        $lastId = mysqli_insert_id($con);
        session_start();
        $_SESSION['id'] = $lastId;
        $_SESSION['nome'] = $nome;
        header("location:perfil.php?id={$lastId}");
    } else {
        header("location:register.php?ero");
    }
}
