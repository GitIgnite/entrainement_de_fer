<!-- AFFICHAGE DU FORMULAIRE D'INSCRIPTION EN FONCTION SI L'UTILISATEUR EST L'ADMIN OU SI L'UTILISATEUR N'EST PAS ENCORE INSCRIT -->
<div class="container">
    <head>
        <?php
        include ('/include/include.php');
        ?>
        <title>Incription</title>
    </head>
    <body>
        <!-- HEADER -->
        <?php
        include ('./include/header.php');
        ?>
        <!-- TITRE -->
        <div class="container">
            <div class="span12" >
                <?php
                // Si l'utilisateur est l'admin --> Affiche du premier echo  sinon affichage du deuxième
                if (Session::getLevel() == 1) {
                    echo '<h1>Inscription d\'un nouvel utilisateur</h1><br>';
                } else {
                    echo '<h1>Inscription</h1><br>';
                }
                ?>
            </div>
        </div>
        <div class="container">
            <div class='span12 offset1'>
                <?php
                // Si l'utilisateur est l'admin --> Affiche du premier lien  sinon affichage du deuxième
                if (Session::getLevel() == 1) {

                    echo '<a href="page_admin.php"\>page administrateur </a><br>';
                } else {

                    echo '<a href="index.php"\>login</a><br>';
                }
                ?>
            </div>
        </div>
        <!-- AFFICHAGE DU FORMULAIRE D'INSCRIPTION -->
        <div class="container">
            <div class="span12 offset3" >
                <?php
                echo fct_formulaire_inscription();
                ?>
            </div>
        </div>
    </body>
</html>
</div>
