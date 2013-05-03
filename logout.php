<!-- AFFICHAGE LORS DE LA DECONNEXION D'UN UTILISATEUR -->
<div class="container">
    <?php
    include("./include/include.php");
    global $connexion;
    
    // Detruit la session qui était en cours
    session_unset(); //Détruit toutes les variables d'une session
    session_destroy(); //Détruit la session
    
    // Affichage d'un lien retour au formulaire de connexion
    echo 'vous êtes déconnecté <br><br>';
    echo '<a href=index.php>Connexion</a>';
    ?>
</div>