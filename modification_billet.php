<!-- SERT D'INTERMEDIAIRE POUR MODIFIE LE BILLET APRES AVOIR CLIQUE SUR LE BOUTON MODIFIER DE LA PAGE modifier_billet.php -->
<?php

include('./include/include.php');

echo modification_billet($_GET['billet']);
header('location:accueil.php');