<!-- SERT D'INTERMEDIAIRE POUR AJOUTER UN SUJET -->
<?php
include('./include/include.php');

// Ajout d'un sujet
echo ajout_sujet();

// Retour à la page accueil
header('location:accueil.php');