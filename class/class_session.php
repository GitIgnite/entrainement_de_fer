<?php

class Session {

    private $login;
    private $password;

    function __construct($login, $password) {
        $this->login = $login;
        $this->password = $password;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public static function login($login, $password) {
        global $connexion;

        $query = 'SELECT id, rang FROM utilisateur WHERE login="' . $login . '" and password="' . $password . '"';
        $result = $connexion->query($query);

        if (sizeof($result) == 1) {

            session_start();
            $_SESSION["id"] = $result[0][0];
            $_SESSION["login"] = $login;
            $_SESSION["password"] = $password;
            $_SESSION["rang"] = $result[0][1];
            return true;
        }

        return false;
    }

    public static function getLevel() {
        if (!empty($_SESSION))
            return ((int) $_SESSION["rang"]);

        return ((int) this::eleve);
    }

}