<?php

class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'gites';

    public function connectPDO()
    {
        try {
            $db= new PDO ('mysql:host='.$this->host.';dbname='.$this->dbname,$this->user,$this->password);
            $db-> exec ('SET NAMES "UTF 8"');
            return $db;
        } catch (PDOException $e){
            echo 'Erreur :'. $e->getMessage();
            die();
        }
}
}
