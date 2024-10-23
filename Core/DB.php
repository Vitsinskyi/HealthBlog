<?php

namespace Core;

class DB
{
    public $pdo;
    public function __construct()
    {
        $host = Config::get()->dbHost;
        $dbname = Config::get()->dbName;
        $login = Config::get()->dbLogin;
        $password = Config::get()->dbPassword;
        $this->pdo = new \PDO("mysql:host=$host;dbname=$dbname", $login, $password);
    }
}
