<?php

class Database
{

    public $pdo;

    private $host = 'localhost';
    private $dbname = 'gites';
    private $user = 'root';
    private $password = '';


    public function getPDO()
    {


        try {
            $pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->password);
            $this->pdo = $pdo;
            //echo 'Connection ok';
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Connexion échouée : ' . $e->getMessage();

        }
    }
}


