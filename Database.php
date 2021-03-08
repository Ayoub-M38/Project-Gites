<?php


class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dbname = 'gites';

    public function connect()
    {
        $db = 'mysql:host=' . $this->host . ';dbname' . $this->dbname;
        $pdo = new PDO($db, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}