<?php
include("./include.php");
global $connexion;

session_unset(); //Détruit toutes les variables d'une session
session_destroy(); //Détruit la session
echo 'vous êtes déconnecté <br><br>';
echo '<a href=index.php>Connexion</a>';