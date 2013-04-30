<?php
include('./include.php');
?>
<html>
    <head>
        <title>Commentaire</title>

    </head>
    <body>
        <?php
        include ('./header.php');
        ?>
        <div class="row">
            <div class='span12 offset11'>
                <h1>Commentaires</h1>
            </div>
        </div>

        <div class="row">
            <div class='span11 offset1'>
                <?php
                echo "<a href=accueil.php>Retour</a>";
                ?>
            </div>
        </div>
        <?php
//==============================AJAX pour l'ajout d'un commentaire===========================================
//=========================================================================================================
        ?>
        <!-- JavaScript : Afficher, Cache le formulaire d'ajout d'un commentaire -->
        <script type="text/javascript">
            function affCache(idDiv) {
                var div = document.getElementById(idDiv);
                if (div.style.display == "")
                    div.style.display = "none";
                else
                    div.style.display = "";
            }
        </script>
        <!-- ====================| BOUTON DEVOILANT LE FORMULAIRE |====================  -->

        <div class="row">
            <div class='span11 offset11'>
                <input type="button" onclick="affCache('ajout_commentaire');" value="Ajouter un commentaire" onClick="ajax_ajout_commentaire();"/>
            </div>
        </div>
        <!-- ====================| FORMULAIRE |====================  -->

        <div class="row">
            <div class='span11 offset8'>
                <div id="ajout_commentaire">
                    <?php
                    echo '<form action="ajout_commentaire.php" method="post">';
                    ?>
                    <textarea name='commentaire' ></textarea>
                    <?php
                    echo '<input id=\'submit\' type=\'submit\' value=\'Ajouter\' />';
                    ?>

                    </form>
                </div>
            </div>
        </div>

        <?php
        ?>
        <!-- ====================| AFFICHAGE DES COMMENTAIRES |====================  -->
        <div class="row after">
            <div id="billet">
                <?php
                echo afficher_commentaire();
                ?>
            </div>
        </div>
    </body>
</html>