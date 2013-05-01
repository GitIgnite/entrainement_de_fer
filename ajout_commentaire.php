<?php
include('./include.php');
echo ajout_commentaire($_GET['billet']);
header('location:commentaire.php?billet='.$_GET['billet']);