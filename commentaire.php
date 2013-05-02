<!-- AFFICHAGE DES COMMENTAIRES D'UN SUJET -->
<div class="container"

     <html>
        <head>
            <title>Commentaire</title>
            <?php
            include('./include.php');
            ?>
            <?php
            include ('./header.php');
            ?>
        </head>
        <body>
            <!-- AFFICHAGE DU TITRE -->
            <div class="container">
                <div class='span12'>
                    <h1>Commentaires</h1>
                </div>
            </div>
            <!-- AFFICHAGE DU LIEN -->
            <div class="container">
                <div class='span12 offset1'>
                    <?php
                    echo "<a href=accueil.php>Retour</a>";
                    ?>
                </div>
            </div>

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
                <div class='span12 offset3'>
                    <input type="button" onclick="affCache('ajout_commentaire');" value="Ajouter un commentaire" />
                </div>
            </div>
            <!-- ====================| FORMULAIRE |====================  -->

            <div class="row">
                <div class='span12 offset3'>
                    <div id="ajout_commentaire">
                        <?php
                        echo '<form action="ajout_commentaire.php?billet='.$_GET['billet'].'" method="post">';
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
                <div class="span10 offset1" id="commentaire">
                        <?php
                        echo afficher_commentaire($_GET['billet']);
                        ?>
                    </div>
                </div>
        </body>
    </html>
</div>