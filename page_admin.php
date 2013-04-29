<?php
include ('./include.php');
// Il faut avoir le rang adminitrateur pour visualiser cette page.Sinon il est redirigé à la page accueil.
if (Session::getLevel() != 1) {
    header('location:accueil.php');
}
?>
<?php
include ('./header.php');
?>
<div class="row_fluid">
    <div class='span12 offset8'>
        <h1>Bonjour monsieur l'admin</h1>
    </div>
</div>
<div class="row_fluid">
    <div class='span12 offset1'>
        <?php
        echo '<a href=accueil.php>Accueil</a><br>';
        echo '<a href=inscription.php>Inscription</a>';
        ?>
    </div>
</div>