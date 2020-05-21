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
    public static ?self $instance = null;


    public function __construct()
    {
        session_start();
        $this->setAttribute('isLogged',false);
        $this->setAttribute('sessionStatus',0);
        $this->setAttribute('lang','fr');
    }

//    /**
//     * Destructor, destroy the current session.
//     */
//    public function __destruct()
//    {
//        session_destroy();
//        unset( $_SESSION );
//
//    }
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Session();
        }
        return self::$instance;
    }



    public function restrictionAccess($url){
        if($this->getAttribute('isLogged')===false){
                header('Location: /homepage');
                // redirect vers une page d'erreur type forbidden access avec un lien pour retourner vers la home page
            }else{
                if($this->getAttribute('sessionStatus')!=3){
                    if(!strpos($url,"admin")){
                        header("Location: /homepage");
                    }
            }
            }
    }


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
    private function isThereAttribute($name)
    {
        if (isset($_SESSION[$name])){
            return true;
        }
        return false;
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

    public function deleteAttribute($name){
        unset($_SESSION[$name]);
    }

}