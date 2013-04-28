<?php

//Classe gérant les différentes sessions.

class Session {

    private $login;
    private $password;

    /**
     * 
     * @param string $login
     * @param string $password
     */
    function __construct($login, $password) {
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * renvoie le login
     * @return string
     */
    public function getLogin() {
        return $this->login;
    }

    /**
     * renvoie le mot de passe
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * reourne le rang de l'utilisateur de celui qui est connecté
     * @return string
     */
    public static function getLevel() {
        if (!empty($_SESSION))
            return ((int) $_SESSION["rang"]);
    }

    /**
     * function permettant d'aller chercher dans la bdd si le login, mdp rentrés éxistent ou non. Si oui, la session s'active + la varible global $_SESSION prend les valeurs
     * Sinon il retourne false car il n'éxiste pas dans la bdd
     * @global type $connexion
     * @param type $login
     * @param type $password
     * @return boolean
     */
    public static function login($login, $password) {
        global $connexion;
        //Requete SQL permettant d'aller chercher l'id et le rang dont le login est $login et le mot de passe est $password
        $query = 'SELECT id, rang FROM utilisateur WHERE login="' . $login . '" and password="' . md5($password) . '"';
        $result = $connexion->query($query);
        //on prend la longueur du résultat ! si il y en a un alors --- Enchainement--- Sinon retourne false
        if (sizeof($result) == 1) {

            session_start();
            $_SESSION["id"] = $result[0][0];
            $_SESSION["login"] = $login;
            $_SESSION["password"] = md5($password);
            $_SESSION["rang"] = $result[0][1];
            return true;
        }

        return false;
    }
    /**
     * Si il n'éxiste pas de session alors il retourne false sinon il retourne true
     * Donc s'il retourne false, cela veut dire qu'il n'y a pas de connexion de session.
     * @return boolean
     */
    public static function isConnected() {
        if (empty($_SESSION))
            return false;

        return true;
    }

}