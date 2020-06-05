<?php
namespace src\Config;

/**
 * Configuration parameters management class.
 *
 * @author TechCare ©
 */
class Config
{
    /** Configuration parameters table */
    private static ?array $parameters = null;

    /**
     * Returns the value of a configuration parameter.
     *
     * @param string $name Parameter name
     * @param string $defaultValue Default return value
     * @param $type
     * @return string Parameter value
     * @throws ConfigException
     */
    public static function get($name, $defaultValue = null)
    {
        $parameters = self::getParameters();
        if (isset($parameters[$name])) {
            $value = $parameters[$name];
        }
        else {
            $value = $defaultValue;
        }
        return $value;
    }

    /**
     * Returns the parameter table, loading it if necessary from a configuration file.
     *
     * @param $type
     * @return array Parameter table
     * @throws ConfigException If no configuration file is found
     */
    private static function getParameters()
    {
        if (self::$parameters == null) {
            // Prod version
            $filePath = "src/Config/prod.ini";
            // Dev version
            // $filePath = "src/Config/dev.ini";
            // if (!file_exists($filePath)) {
            //    $filePath = "prod.ini";
            // }
             if (!file_exists($filePath)) {
                 throw new ConfigException("Aucun fichier de configuration trouvé");
             }
            // else {
            //     self::$parameters = parse_ini_file($filePath);
            // }
        }
        return self::$parameters;
    }

}
