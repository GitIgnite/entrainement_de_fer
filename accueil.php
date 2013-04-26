<?php
include('./include.php');
if (Session::isConnected()) {
    setcookie("login", $_SESSION['login'], (time() + 365 * 54 * 3600));
    setcookie("password", $_SESSION['password'], (time() + 365 * 54 * 3600));
}
    ?>

    <head>
        <title>Accueil</title>
    </head>
    <body>
        <div class="row_fluid">
            <div class='span12 offset10'>
                <h1>Accueil</h1>
            </div>
        </div>
        <br><br><br><br><br>
        <div class="row_fluid">
            <div class='span12 offset1'>
                <?php
                // pour visualiser ce lien, il faut avoir le rang 1 ---> adminitrateur
                if (Session::getLevel() == 1) {
                    echo '<a href="page_admin.php"\>admin</a><br>';
                }
                echo '<a href="index.php"\>connexion</a><br>';
                echo '<a href="logout.php"\>logout</a><br>';
                ?>
            </div>
        </div>
    </body>
    </html>
