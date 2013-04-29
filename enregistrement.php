<div class="row_fluid">
    <div class='span12 offset1'>
        <?php
        include ('include.php');
        if (Session::getLevel() == 1) {
            echo '<a href="page_admin.php"\>page administrateur </a><br>';
            echo '<a href="inscription.php"\>Retour à l\'inscription </a><br>';
        } else {
            echo '<a href="index.php"\>login</a><br>';
        }

        //En cas d'inscription d'un utilisateur, le champ sera vide donc il prendra auto le rang 4
        if (!isset($_POST['rang_ins'])) {
            $_POST['rang_ins'] = "4";
        }
        echo ajout_utilisateur($_POST['pseudo_ins'], $_POST['password_ins'], $_POST['rang_ins']);
        ?>
    </div>
</div>

