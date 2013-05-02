<!-- SERT D'INTERMEDIAIRE POUR SUPPRIMER UN BILLET APRES AVOIR CLIQUE SUR LE BOUTON SUPPRIMER DU BILLET -->
<?php
include('./include.php');
echo supprimer_billet($_GET['billet']);
header('location:accueil.php');