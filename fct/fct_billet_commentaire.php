<?php

//=================================================AFFICHAGE BILLET, COMMENTAIRE===========================================================
// Fonction permettant d'afficher les sujet
function afficher_billet() {
    global $connexion;

    $query = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation FROM billets ORDER BY date_creation ASC';
    $result = $connexion->query($query);

    foreach ($result as $resultat) {
        echo '<h3>';
        if (Session::getLevel() < 3) {
            echo '<em><a href=modifier_billet.php?billet=' . $resultat['id'] . '>Modifier</a></em>';
        }
        echo $resultat['titre'] . ' ';
        echo $resultat['date_creation'] . ' ';
        if (Session::getLevel() < 3) {
            echo '<em><a href=supprimer_billet.php?billet=' . $resultat['id'] . '>Supprimer</a></em>';
        }
        echo '</h3><p>' . $resultat['contenu'] . '<br>';
        echo '<a href=commentaire.php?billet=' . $resultat['id'] . '>Commentaire(s)</a></p>';
    }
}

//Fonction permettant d'afficher les commentaires
Function afficher_commentaire($id) {
    global $connexion;
    $query = 'SELECT id, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire FROM commentaires WHERE id_billet="' . $id . '" ORDER BY date_commentaire DESC ';
    $result = $connexion->query($query);
    foreach ($result as $resultat) {
        echo '<h3>';
        if (Session::getLevel() < 3 or $resultat['auteur'] == $_SESSION['login']) {
            echo '<em><a href=modifier_commentaire.php?commentaire=' . $resultat['id'] . '>Modifier</a></em>';
        }
        echo $resultat['auteur'] . ' ';
        echo $resultat['date_commentaire'] . ' ';
        if (Session::getLevel() < 3 or $resultat['auteur'] == $_SESSION['login']) {
            echo '<em><a href=supprimer_commentaire.php?commentaire=' . $resultat['id'] . '>Supprimer</a></em>';
        }

        echo '</h3><p>' . $resultat['commentaire'] . '</p>';
    }
}

//================================================================================================================================
//=================================================AJOUT BILLET, COMMENTAIRE===========================================================
// Fonction qui ajoute un nouveau commentaire
function ajout_commentaire($id) {
    global $connexion;

    $query = 'INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES (' . $id . ',"' . $_SESSION['login'] . '","' . $_POST['commentaire'] . '","' . date("Y-m-d") . ' ' . date("H:i:s") . '")';
    $connexion->exec($query);
}

// Fonction qui ajoute un nouveau sujet
function ajout_sujet() {
    global $connexion;

    $query = 'INSERT INTO billets(titre,contenu,date_creation) VALUES ("' . $_POST['titre'] . '","' . $_POST['contenu'] . '","' . date("Y-m-d") . ' ' . date("H:i:s") . '")';
    $connexion->exec($query);
}

//================================================================================================================================
//=================================================SUPPRESSION BILLET, COMMENTAIRE===========================================================
// Supprimer Les Sujets (Seul l'administrateur peut).
function supprimer_billet($id) {
    global $connexion;


    $query = 'DELETE FROM commentaires WHERE id_billet=' . $id . ';';
    $query.='DELETE FROM billets WHERE id=' . $id;
    $connexion->exec($query);
}

// Supprimer les commentaires 
function supprimer_commentaire() {
    global $connexion;

    $query_billet = 'SELECT id_billet FROM commentaires WHERE id=' . $_GET['commentaire'];
    $result = $connexion->query($query_billet);
    foreach ($result as $resultat) {
        $id_billet = $resultat['id_billet'];
        $retour = header('location:commentaire.php?billet=' . $id_billet);
    }
    $query = 'DELETE FROM commentaires where id=' . $_GET['commentaire'];
    $connexion->exec($query);
    return $retour;
}

//================================================================================================================================
//=================================================MODIFICATION DU BILLET===========================================================
// Afficher le billet à modifier
function afficher_billet_a_modifier($id) {
    global $connexion;

    $query = 'SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%i\') AS date_creation FROM billets WHERE id=' . $id;
    $result = $connexion->query($query);
    foreach ($result as $resultat) {
        echo '<h3>' . $resultat['titre'] . ' ';
        echo $resultat['date_creation'] . ' ';
        echo '</h3><p>' . $resultat['contenu'];
        echo '</p><br>';
    }
}

// Affiche le formulaire pour modifier le billet
function form_billet_modif($id) {

    $form = '<form action="modification.php?billet=' . $id . '" method="post">';
    $form.='<div class=\'span10\'>';
    $form.='<textarea name=\'titre\'>Titre</textarea>';
    $form.='</div>';
    $form.='<div class=\'span10\'>';
    $form.='<textarea name=\'contenu\'>Contenu</textarea>';
    $form.='</div>';
    $form.='<input id=\'submit\' type=\'submit\' value=\'Modifier\' />';
    $form.='</form>';

    return $form;
}

// requete permetant de modifier le sujet
function modification_billet($id) {
    global $connexion;

    $query = 'UPDATE billets SET titre = "' . $_POST['titre'] . '", contenu="' . $_POST['contenu'] . '" WHERE id =' . $id;
    $connexion->exec($query);
}

//================================================================================================================================
//=================================================MODIFICATION DU COMMENTAIRE===========================================================

function afficher_commentaire_a_modifier($id) {
    global $connexion;

    $query = 'SELECT id, id_billet, auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%i\') AS date_commentaire FROM commentaires WHERE id="' . $id . '"';
    $result = $connexion->query($query);
    foreach ($result as $resultat) {
        echo '<h3>' . $resultat['auteur'] . ' ';
        echo $resultat['date_commentaire'] . ' ';
        echo '</h3><p>' . $resultat['commentaire'] . '</p>';
        $_SESSION['id_billet'] = $resultat['id_billet'];
    }
}

//Lien de retour au billet
function afficher_lien_retour() {
    $lien = '<a href=commentaire.php?billet=' . $_SESSION['id_billet'] . '>Retour</a><br><br>';

    return $lien;
}

// Formulaire permetant de modifier le commentaire
function form_commentaire_modif($id) {
    $form = '<form action="modification_commentaire.php?commentaire=' . $id . '" method="post">';
    $form.='<div class=\'span10\'>';
    $form.='<textarea name=\'commentaire\'></textarea>';
    $form.='</div>';
    $form.='<input id=\'submit\' type=\'submit\' value=\'Modifier\' />';
    $form.='</form>';

    return $form;
}

// requete permetant de modifier le commentaire
function modification_commentaire($id) {
    global $connexion;

    $query = 'UPDATE commentaires SET commentaire = "' . $_POST['commentaire'] . '" WHERE id =' . $id;
    $connexion->exec($query);
}
