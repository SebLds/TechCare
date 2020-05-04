<?php

namespace src;
/**
 * Class modeling the session.
 * Encapsulates the PHP $_SESSION superglobal.
 *
 * @author TechCare ©
 */
class Session
{
    private string $sessionType; // récup le type de user soit visiteur, patient, gestionnaire ou admin
    // restriction d'accès et de contenu en fonction du statut
    // mettre en place un système pour éviter le vol de session

//    /** Constructor, start or restore the session.
//     */
    public function __construct()
    {
        session_start();
        $this->sessionType='visiteur';
        self::setAttribute('sessionType',$this->sessionType);
    }

    /**
     * Destructor, destroy the current session.
     */
    public function __destruct()
    {
        session_destroy();
        unset( $_SESSION );

    }
//    public static function sessionStart(){
//        session_start();
//        $_SESSION = array();
//        self::$sessionType='visiteur';
//        self::setAttribute('sessionType',self::$sessionType);
//    }
//    public static function sessionStop(){
//        session_destroy();
//        unset( $_SESSION );
//    }


    /**
     * Add an attribute to the session.
     *
     * @param string $name Attribute name
     * @param string $value Attribute value
     */
    public function setAttribute($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    /**
     * Returns true if the attribute exists in the session.
     *
     * @param string $name Attribute name
     * @return bool True if the attribute exists and its value is not empty
     */
    public function isThereAttribute($name)
    {
        return (isset($_SESSION[$name]) && $_SESSION[$name] != "");
    }

    /**
     * Returns the value of the requested attribute.
     *
     * @param string $name Attribute name
     * @return string Attribute name
     * @throws SessionException If the attribute does not exist in the session
     */
    public function getAttribute($name)
    {
        if ($this->isThereAttribute($name)) {
            return $_SESSION[$name];
        }
        else {
            throw new \Exception("Attribut '$name' absent de la session");
        }
    }

}