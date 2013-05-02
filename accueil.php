<div class="container">
    <?php
    include('./include.php');
    if (Session::isConnected()) {
        ?>

        <head>
            <title>Accueil</title>
        </head>
        <body>
            <!-- HEADER -->
            <?php
            include ('./header.php');
            ?>
            
            <!-- Titre -->
            <div class="row">
                <div class='span12'>
                    <h1>Accueil</h1>
                </div>
            </div>
            <br><br><br><br><br>
            
            <!-- AFFICHAGE DU LIEN -->
            <div class="row">
                <div class='span12 offset1'>
                    <?php
                    // pour visualiser ce lien, il faut avoir le rang 1 ---> adminitrateur
                    if (Session::getLevel() == 1) {
                        echo "<a href=page_admin.php>admin</a>";
                    }
                    ?>
                </div>
            </div>

            <!-- AFFICHAGE DES BILLET -->
            <div class="row">
                <div class="span11" id="sujet">
                    <?php
                    echo afficher_billet();
                    ?>
                </div>
            </div>
        </body>
    </html>
    <?php
}
?>
</div>