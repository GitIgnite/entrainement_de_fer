<?php
include('./include.php');
echo supprimer_commentaire();
header('location:commentaire.php?billet='.$_SESSION['billet']);