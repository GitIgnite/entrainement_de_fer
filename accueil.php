<div class="container">
    <?php
    include('./include.php');
    if (Session::isConnected()) {
        ?>

        <head>
            <title>Accueil</title>
        </head>
        <body>
            <?php
            include ('./header.php');
            ?>
            <div class="container">
                <div class='span12'>
                    <h1>Accueil</h1>
                </div>
            </div>
            <br><br><br><br><br>
            <div class="container">
                <div class='span12 offset1'>
                    <?php
                    // pour visualiser ce lien, il faut avoir le rang 1 ---> adminitrateur
                    if (Session::getLevel() == 1) {
                        echo "<a href=page_admin.php>admin</a>";
                    }
                    ?>
                </div>
            </div>

            <div class="container">
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