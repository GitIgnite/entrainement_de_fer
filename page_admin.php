<?php
//$connexion= new Connexion();
include ('./include.php');
//if (Session::getLevel()==1){
if (Session::getLevel()!=1){
    header('location:accueil.php');
}
?>

<div class="row_fluid">
    <div class='span12 offset8'>
        <h1>Bonjour monsieur l'admin</h1>
    </div>
</div>
<?php
//}
//else
//{ 
//    header('location:accueil.php');
//}