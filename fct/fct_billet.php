<?php

//=================================================AFFICHAGE BILLET===========================================================
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


//===========================================================AJOUT BILLET===================================================================

// Fonction qui ajoute un nouveau sujet
function ajout_sujet() {
    global $connexion;

    $query = 'INSERT INTO billets(titre,contenu,date_creation) VALUES ("' . $_POST['titre'] . '","' . $_POST['contenu'] . '","' . date("Y-m-d") . ' ' . date("H:i:s") . '")';
    $connexion->exec($query);
}


//===========================================================================================================================================
//=================================================SUPPRESSION BILLET===========================================================
// Supprimer Les Sujets (Seul l'administrateur peut).
function supprimer_billet($id) {
    global $connexion;


    $query = 'DELETE FROM commentaires WHERE id_billet=' . $id . ';';
    $query.='DELETE FROM billets WHERE id=' . $id;
    $connexion->exec($query);
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

    $form = '<form action="modification_billet.php?billet=' . $id . '" method="post">';
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
