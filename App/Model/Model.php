<?php
class Model{
    public static $pdo;

    public static function init()
    {
        $login = Config::getLogin();
        $hostname = Config::getHostname();
        $database_name = Config::getDatabase();
        $password = Config::getPassword();
        try{
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch(PDOException $e) {
            echo $e->getMessage();
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            die();
        }
    }
}
