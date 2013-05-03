<!-- PAGE POUR MODIFIER UN COMMENTAIRE, JUSTE ACCECIBLE AUX UTILISATEUR AILLANT FAIT LE COMMENTAIRE OU AILLANT UN RANG ELEVE -->
<?php
include('./include.php');
?>
<!-- Affichage des billet à modifier -->
<div class="container">
    <div class = "row">
        <div class = "span10 offset1" id = "commentaire">
            <h1>Modification du commentaire</h1>
        </div>
    </div>
    <div class = "row">
        <div class = "span10 offset1" id = "commentaire">
            <?php
            echo afficher_commentaire_a_modifier($_GET['commentaire']);
            ?>
        </div>
    </div>

    <!-- Affichage du lien retour -->
    <div class = "row">
        <div class = "span10 offset1" >
            <?php
            echo '<a href=commentaire.php?billet=' . $_SESSION['id_billet'] . '>Retour</a><br><br>';
            ?>
        </div>
    </div>

    <!-- Affichage du formulaire pour modifier le billet -->
    <div class = "row">
        <div class = "span10 offset1" id = "commentaire">
            <?php
            echo form_commentaire_modif($_GET['commentaire']);
            ?>
        </div>
    </div>
</div>

