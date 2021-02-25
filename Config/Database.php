<?php

namespace Config {

    use PDO;

    class Database
    {
        static function getConnection()
        {
            $host = 'localhost';
            $port = '3306';
            $database = 'belajarphptodolist';
            $username = 'root';
            $pass = '';
            return new PDO("mysql:host=" . $host . ";dbname=" . $database, $username, $pass);
        }
    }
}
