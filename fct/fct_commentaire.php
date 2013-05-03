<?php

//=================================================AFFICHAGE COMMENTAIRE===========================================================

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
//=================================================AJOUT COMMENTAIRE===========================================================
// Fonction qui ajoute un nouveau commentaire
function ajout_commentaire($id) {
    global $connexion;

    $query = 'INSERT INTO commentaires(id_billet, auteur, commentaire, date_commentaire) VALUES (' . $id . ',"' . $_SESSION['login'] . '","' . $_POST['commentaire'] . '","' . date("Y-m-d") . ' ' . date("H:i:s") . '")';
    $connexion->exec($query);
}

//================================================================================================================================
//=================================================SUPPRESSION COMMENTAIRE===========================================================

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
