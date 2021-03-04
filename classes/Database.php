<?php
session_start();

class Database
{   private $host="localhost";
    private $dbname="projet_gites";
    private $user="root";
    private $password="";


    public function connect(){
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
