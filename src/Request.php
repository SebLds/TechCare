<?php
namespace APP;

require_once 'Session.php';

/**
 * Class modeling an incoming HTTP request. *
 *
 * @author TechCare ©
 */
class Request
{
    /** Table of request parameters */
    private $parameters;

    /** Session object associated with the request */
    private $session;

    /**
     * Constructor.
     *
     * @param array $parameters Request parameters
     */
    public function __construct($parameters)
    {
        $this->parameters = $parameters;
        $this->session = new Session();
    }

    /**
     * Returns the session object associated with the request.
     *
     * @return Session Session object
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Returns true if the parameter exists in the request.
     *
     * @param string $name Parameter name
     * @return bool True if the parameter exists and its value is not empty
     */
    public function isThereParameter($name)
    {
        return (isset($this->parameters[$name]) && $this->parameters[$name] != "");
    }

    /**
     * Returns the value of the requested parameter.
     *
     * @param string $name Parameter name
     * @return string Parameter value
     * @throws RequestException If the parameter does not exist in the request
     */
    public function getParameter($name)
    {
        if ($this->isThereParameter($name)) {
            return $this->parameters[$name];
        }
        else {
            throw new \Exception("Paramètre '$name' absent de la requête");
        }
    }

}