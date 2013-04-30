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
        <div class="row">
            <div class='span12 offset11'>
                <h1>Accueil</h1>
            </div>
        </div>
        <br><br><br><br><br>
        <div class="row">
            <div class='span11 offset1'>
                <?php
                // pour visualiser ce lien, il faut avoir le rang 1 ---> adminitrateur
                if (Session::getLevel() == 1) {
                        echo "<a href=page_admin.php>admin</a>";
                }
                    
                ?>
            </div>
        </div>

        <div class="row after">
            <div id="billet">
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