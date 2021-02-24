<?php

namespace Config {

    use PDO;

    class Database
    {
        static function getConnection()
        {
            $host = 'localhost';
            $port = '3360';
            $database = 'belajarphptodolist';
            $username = 'root';
            $pass = '';
            return new PDO("mysql:host=$host;dbnames=$database,$username,$pass");
        }
    }
}
