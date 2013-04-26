<?php
include('./class/class_connexion.php');
include('./class/class_session.php');

$connexion = new Connexion();

//SESSION
session_start();
setcookie("login", $_SESSION['login'], (time() + 365 * 54 * 3600));
setcookie("password", $_SESSION['password'], (time() + 365 * 54 * 3600));
?>
<link rel="stylesheet" href="./css/design.css">