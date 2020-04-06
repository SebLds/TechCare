<?php
class testmodel{
    public static $pdo;

    public static function init()
    {
        $login = conf::getLogin();
        $hostname = conf::getHostname();
        $database_name = conf::getDatabase();
        $password = conf::getPassword();
    }
}
