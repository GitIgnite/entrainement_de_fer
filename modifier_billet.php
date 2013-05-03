<!-- PAGE POUR MODIFIER UN BILLET, JUSTE ACCECIBLE AUX UTILISATEUR AILLANT UN RANG ELEVE -->
<?php
include('./include/include.php');
if (Session::getLevel() > 2) {
    header('location:accueil.php');
}
?>
<!-- Affichage du billet à modifier -->
<div class="container">
    <div class = "row">
        <div class = "span10 offset1" id = "commentaire">
            <h1>Modification du billet</h1>
        </div>
    </div>
    <div class = "row">
        <div class = "span10 offset1" id = "commentaire">
            <?php
            echo afficher_billet_a_modifier($_GET['billet']);
            ?>
        </div>
    </div>

    <!-- Affichage du lien retour -->
    <div class = "row">
        <div class = "span10 offset1" >
            <?php
            echo "<a href=accueil.php>Retour</a><br><br>";
            ?>
        </div>
    </div>

    <!-- Affichage du formulaire pour modifier le billet -->
    <div class = "row">
        <div class = "span10 offset1" id = "commentaire">
            <?php
            echo form_billet_modif($_GET['billet']);
            ?>
        </div>
    </div>
</div>

