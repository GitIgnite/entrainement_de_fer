<div class="row_fluid">
    <div class='span12 offset1'>
        <?php
        include ('include.php');
        echo '<a href="page_admin.php"\>page administrateur </a><br>';
        echo '<a href="inscription.php"\>Retour à l\'inscription </a><br>';
        echo ajout_utilisateur($_POST['pseudo_ins'], $_POST['password_ins'], $_POST['rang_ins']);
?>
    </div>
</div>

        