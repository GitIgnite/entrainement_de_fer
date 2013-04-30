<?php
include('./include.php');
echo ajout_commentaire();
header('location:commentaire.php?billet='.$_SESSION['billet']);