<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SysEducation</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<?php

ini_set('display_errors', 'Off');
ini_set('log_errors', TRUE);
ini_set('error_log', 'php_error.txt');

if(!isset($_SESSION)){
    session_start();
}

if(isset($_POST['typeL'])){
    require "src/classes.db/login_db.php";
    $verifyLogin = doLogin();
    if($verifyLogin != 0){
        $_SESSION['typeL'] = $verifyLogin['tipo'];
        $_SESSION['codUser'] = $verifyLogin['id'];
    }else{
        $msgErr = "<p class='text-center text-danger'>Erro ao realizar login!</p>";
    }
}

if(isset($_GET['sair'])){
    session_destroy();
    header('location:index.php');
}

$verifyLogin = ($verifyLogin) ? $verifyLogin : "";
$dataAtual = date('d/m/Y');
#echo '<pre style="color:GREEN">aaaa: '.$_SESSION['typeL'].'</pre>';

switch ($_SESSION['typeL']){
    case (1):
        $_SESSION['typeL'] = 1;
        $activePage = "home";
        require 'views/menu.php';
        require 'src/adm.php';
        require 'views/footer.php';
        break;

    case (2):
        $_SESSION['typeL'] = 2;
        $activePage = "home";
        require 'views/menu.php';
        require 'src/professor.php';
        require 'views/footer.php';
        break;

    case (3):
        $_SESSION['typeL'] = 3;
        $activePage = "home";
        require 'views/menu.php';
        require 'src/aluno.php';
        require 'views/footer.php';
        break;

    default:
        include 'views/login.php';
        break;
}