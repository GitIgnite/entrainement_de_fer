<?php 
//$connexion= new Connexion();
include ('./include.php');
if (Session::getLevel()==1){
?>
    <h1>Bonjour monsieur l'admin</h1>
<?php
}
else
{ 
    header('location:accueil.php');
}