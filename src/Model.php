<?php




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
    private static PDO $bdd;

    /**
     * Execute an SQL query.
     *
     * @param string $sqlStatement SQL query
     * @param array $params Request parameters
     * @return bool|false|\PDOStatement
     * @throws ConfigException
     */
    protected function executeRequest($sqlStatement, $params = null)
    {
        if ($params == null) {
            $result = self::getBdd()->query($sqlStatement);   // exécution directe
        }
        else {
            $result = self::getBdd()->prepare($sqlStatement); // requête préparée
            $result->execute($params);
        }
        return $result;
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
            $dsn = Config::get("dsn");
            $login = Config::get("login");
            $password = Config::get("password");
            // Création de la connexion
            self::$bdd = new PDO($dsn, $login, $password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return self::$bdd;
    }

}
