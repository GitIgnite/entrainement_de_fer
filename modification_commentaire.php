<!-- INTERMEDIAIRE DE MODIFICATION D'UN COMMENTAIRE -->
<?php
include('./include.php');

echo modification_commentaire($_GET['commentaire']);
header('location:commentaire.php?billet='.$_SESSION['id_billet']);