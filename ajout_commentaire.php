<!-- SERT D'INTERMEDIAIRE POUR AJOUTER UN COMMENTAIRE -->
<?php
include('./include.php');
// Ajoute un commentaire au billet
echo ajout_commentaire($_GET['billet']);
// retour à la liste des commentaires
header('location:commentaire.php?billet='.$_GET['billet']);