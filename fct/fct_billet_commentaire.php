<?php

// Fonction permettant d'afficher les sujet
function afficher_billet() {
    global $connexion;

    $query = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation FROM billets ORDER BY date_creation ASC';
    $result = $connexion->query($query);
    foreach ($result as $resultat) {
        echo '<h3>' . $resultat['titre'] . ' ';
        echo $resultat['date_creation'] . '</h3>';
        echo '<p>' . $resultat['contenu'] . '<br>';
        echo '<a href=commentaire.php?billet=' . $resultat['id'] . '>Commentaire(s)</a></p>';
    }
    
}

//Fonction permettant d'afficher les commentaires
function afficher_commentaire($id) {
    global $connexion;
    $query = 'SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire FROM commentaires WHERE id_billet="' . $id . '" ORDER BY date_commentaire DESC ';
    $result = $connexion->query($query);
    foreach ($result as $resultat) {
        echo '<h3>' . $resultat['auteur']. ' ';
        echo $resultat['date_commentaire'] . '</h3>';
        echo '<p>' . $resultat['commentaire'] . '</p>';
    }
}

// Fonction qui ajoute un nouveau commentaire
function ajout_commentaire($id){
    global $connexion;
    
    $query='INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES ('.$id.',"'.$_SESSION['login'].'","'.$_POST['commentaire'].'","'.date("Y-m-d").' '.date("H:i:s").'")';
    $connexion->exec($query);
}

// Fonction qui ajoute un nouveau sujet
function ajout_sujet(){
    global $connexion;
    
    $query= 'INSERT INTO billets(titre,contenu,date_creation) VALUES ("'.$_POST['titre'].'","'.$_POST['contenu'].'","'.date("Y-m-d").' '.date("H:i:s").'")';
    $connexion->exec($query);
    
}