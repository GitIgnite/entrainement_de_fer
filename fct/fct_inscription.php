<?php

// Formulaire d'inscription
function fct_formulaire_inscription() {
    $form = '<form action = "enregistrement.php" method = "post">';
    $form.='<TABLE>';
    $form.='<tr><td>pseudo :</td><td><input type = "text" name = "pseudo_ins" /><br></td></tr>';
    $form.='<tr><td>mot de passe :</td><td><input type = "password" name = "password_ins" /><br></td></tr>';
    if (Session::getLevel() == 1) {
        $form.='<tr><td>rang :</td><td><SELECT name = "rang_ins" size = "1">
                                        <OPTION>1
                                        <OPTION>2
                                        <OPTION>3
                                        <OPTION>4
                                    </SELECT><br></td></tr>';
    }
    $form.='</TABLE><br>';
    $form.='<input type = "submit" value = " envoyer">';
    $form.='</form>';
    return $form;
}

// Fonction : si les champs sont remplis, et si le nom d'utilisateur n'est pas pris alors
// il peut faire l'enregistrement. Sinon il demande de le changer
function ajout_utilisateur($pseudo_ins, $password_ins, $rang_ins) {
    $pseudo_ins = $_POST['pseudo_ins'];
    $password_ins = $_POST['password_ins'];

    $rang_ins = $_POST['rang_ins'];


    if (isset($_POST) && !empty($pseudo_ins) && !empty($password_ins) && !empty($rang_ins)) {

        global $connexion;

        $query_recherche = 'SELECT * from utilisateur where login= "' . $pseudo_ins . '"';

        $result_recherche = $connexion->query($query_recherche);

        // Si le nom existe déjà dans la bdd, il n'en crée pas un autre. S'il n'éxiste pas
        // il crée un nouvel utilisateur
        if (sizeof($result_recherche) == 1) {

            echo 'Ce nom d\'utilisateur est déjà utilisé !';
        } else {

            $query = 'INSERT INTO utilisateur(login,password,rang) VALUES ("' . $pseudo_ins . '","' . md5($password_ins) . '","' . $rang_ins . '")';
            $connexion->exec($query);
            if (Session::getLevel() == 1) {
                echo '<h2>Utilisateur enregistré : </h2>';
                echo 'rang : ' . $rang_ins . '<br>';
            } else {
                echo '<h2>vos identifiants: </h2>';
            }

            echo 'pseudo : ' . $pseudo_ins . '<br>';
            echo 'mot de passe : ' . $password_ins . '<br>';
        }
    } else {

        echo 'vous n\'avez pas remplit tous les champs';
    }
}