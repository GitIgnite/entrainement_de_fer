<html>
    <head>
        <title>Accueil</title>
    </head>
    <body>
        <?php
        include ('./include.php');
        /**
         * Condition
         * Si les champs sont remplis |
         * extraction des clés $_POST dans une variable | exemple pour login --- $_POST['login']---> $login
         * appel de la methode login de la classe Session --- Va chercher dans la base de données l'identifiant + mdp.
         * Si il existe alors il est redirigé vers l'accueil et la session s'active (voir methode login de la classe Session)
         * Sinon il est redirigé sur la page pour s'identifier à nouveau
         */
        if (isset($_POST) && !empty($_POST['login']) && !empty($_POST['password'])) {
            extract($_POST);
            if (Session::login($login, $password)) {
                setcookie("login", $_SESSION['login'], (time() + 365 * 54 * 3600), null, null, false, true);
                setcookie("password", $_SESSION['password'], (time() + 365 * 54 * 3600), null, null, false, true);
                header("location: accueil.php");
            } else {
                header("location: index.php");
            }
        } else {
            header("location: index.php");
        }
        ?>
    </body>
</html>