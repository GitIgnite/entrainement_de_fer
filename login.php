<html>
    <head>
        <title>Accueil</title>
    </head>
    <body>
        <?php
        include ('./include.php');

        if (isset($_POST) && !empty($_POST['login']) && !empty($_POST['password'])) {
            extract($_POST);
            if (Session::login($login, $password))
                header("location: accueil.php");
            else {
                header("location: index.php");
            }
        }
        else{
            header("location: index.php");
        }

        ?>
    </body>
</html>