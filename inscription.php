<div class="container">
    <head>
        <?php
        include ('include.php');
//    if (Session::getLevel() != 1) {
//        header('location:accueil.php');
//    }
        ?>
        <title>Incription</title>
    </head>
    <body>
        <?php
        include ('./header.php');
        ?>
        <div class="container">
            <div class="span12" >
                <?php
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
                if (Session::getLevel() == 1) {

                    echo '<a href="page_admin.php"\>page administrateur </a><br>';
                } else {

                    echo '<a href="index.php"\>login</a><br>';
                }
                ?>
            </div>
        </div>
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
