<?php

class Db 
{

    public static function getConnection() 
    {

        $dbConfig = include ROOT . '/config/db_params.php';

        $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}";
        $user = $dbConfig['user'];
        $pass = $dbConfig['pass'];
 
        $db = new PDO($dsn, $user, $pass);

        $db->exec("set names utf8");

        return $db;  

    }

}