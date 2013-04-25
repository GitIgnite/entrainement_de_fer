<?php

/**
 * Description of class_connexion
 *
 * @author usig
 */
class Connexion extends PDO {

    function __construct() 
    {
        $dsn = 'mysql:dbname=entrainement_de_fer;host=127.0.0.1';
        $user = 'root';
        $password = '';

        try 
        {
            parent::__construct($dsn, $user, $password);
        } 
        catch (PDOException $e) 
        {
            echo 'Connexion échouée : ' . $e->getMessage();
        }

        $this->exec('SET NAMES \'utf8\'');
    }

    function query($query)
    {
		$result=parent::query($query);
		return $result->fetchAll();
	}


	function table($table)
    {
		return $this->query('select * from '.$table);
	}
}

?>
