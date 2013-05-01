<div class="container">
    <?php
    include ('./include.php');
// Il faut avoir le rang adminitrateur pour visualiser cette page.Sinon il est redirigé à la page accueil.
    if (Session::getLevel() != 1) {
        header('location:accueil.php');
    }
    ?>
    <?php
    include ('./header.php');
    ?>
    <div class="conainer">
        <div class='span12'>
            <h1>Bonjour monsieur l'admin</h1>
        </div>
    </div>
    <div class="container">
        <div class='span12 offset1'>
            <?php
            echo '<a href=accueil.php>Accueil</a><br>';
            echo '<a href=inscription.php>Inscription</a>';
            ?>
        </div>
    </div>
    <div class="conainer">
        <div class='span12'>
            <h2>Ajout d'un nouveau sujet</h2>
        </div>
        <div class='span12 offset3'>
            <form action='ajout_sujet.php' method='post'>
                <div class='span12'>
                    <textarea name='titre'>Titre</textarea>
                </div>                
                <div class='span12'>
                    <textarea name='contenu'>Contenu</textarea>
                    <input id='submit' type='submit' value='Ajouter'/>
                </div>

            </form>
        </div>

    </div>
</div>