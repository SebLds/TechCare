<?php


namespace src;


use \PDO;
use PDOStatement;
use src\Config\Config;
use src\Config\ConfigException;

/**
 * Model abstract class.
 * Centralizes the access services to a database.
 * Uses the PDO API of PHP.
 *
 * @author TechCare ©
 */
abstract class Model
{

    /** PDO object for access to the DB, static therefore shared by all instances of derived classes */
    private static ?PDO $bdd = null;

    /**
     * Execute an SQL query.
     *
     * @param string $sqlStatement SQL query
     * @param array $params Request parameters
     * @return bool|false|PDOStatement
     * @throws ConfigException
     */
    protected function executeRequest($sqlStatement, $params = null)
    {
        if ($params == null) {
            $request = self::getBdd()->prepare($sqlStatement);
            $request->execute();
        }
        else {
            $request = self::getBdd()->prepare($sqlStatement);
            $request->execute($params);
        }
        return $request;
    }
    public function research($table,$section,$key,$bool=false,$idTag=null){
        if(!$bool){
            return $this->executeRequest("SELECT * FROM $table WHERE $section LIKE '%$key%'")->fetchAll(PDO::FETCH_OBJ);
        }else{
            return $this->executeRequest("SELECT * FROM post p INNER JOIN thread t ON t.ID_Thread = p.ID_Thread WHERE Thread_Title LIKE '%$key%' AND ID_Tag= :idTag",array('idTag' => $idTag))->fetchAll(PDO::FETCH_OBJ);
        }
    }

    /**
     * Returns a connection object to the database, initializing the connection if necessary.
     *
     * @return PDO PDO object for connection to the database
     * @throws ConfigException
     * @throws ConfigException
     */
    private static function getBdd()
    {
        if (self::$bdd === null) {
            // Récupération des paramètres de configuration BD
            $dsn = Config::get("dsn",);
            $login = Config::get("login",);
            $password = Config::get("mdp",);

            // Création de la connexion
            self::$bdd = new PDO($dsn, $login, $password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }

    public static function getDate() {
      date_default_timezone_set("Europe/Paris");
      $date = date('d/m/Y') . " " . date('H:i:s');
      return $date;
    }

    public static function convertDate($date){
        $date = explode('/',$date);
        $date = array_reverse($date);
        $date = implode('-',$date);
        return "$date";
    }



}
