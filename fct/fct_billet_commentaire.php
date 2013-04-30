<?php

function afficher_billet() {
    global $connexion;

    $query = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation FROM billets ORDER BY date_creation DESC';
    $result = $connexion->query($query);
    foreach ($result as $resultat) {
        echo '<h3>' . $resultat['titre'] . ' ';
        echo $resultat['date_creation'] . '</h3>';
        echo '<p>' . $resultat['contenu'] . '<br>';
        echo '<a href=commentaire.php?billet=' . $resultat['id'] . '>Commentaire(s)</a></p>';
    }
    
}

Function afficher_commentaire() {
    global $connexion;
    $_SESSION['billet']=$_GET['billet'];
    $query = 'SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire FROM commentaires WHERE id_billet="' . $_SESSION['billet'] . '" ORDER BY date_commentaire DESC ';
    $result = $connexion->query($query);
    foreach ($result as $resultat) {
        echo '<h3>' . $resultat['auteur']. ' ';
        echo $resultat['date_commentaire'] . '</h3>';
        echo '<p>' . $resultat['commentaire'] . '</p>';
    }
}

function ajout_commentaire(){
    global $connexion;
    
    $query='INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES ('.$_SESSION['billet'].',"'.$_SESSION['login'].'","'.$_POST['commentaire'].'","'.date("Y-m-d").' '.date("H:i:s").'")';
    $connexion->exec($query);
    var_dump($query);
}