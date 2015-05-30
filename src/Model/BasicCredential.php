<?php namespace YAUM\Model;

use YAUM\Contract\Credential;

/**
 * Description of BasicCredential
 *
 * @author christian
 */
class BasicCredential implements Credential
{

    /**
     *
     * @var string
     */
    private $username;

    /**
     *
     * @var string
     */
    private $password;

    /**
     * 
     * @param string $username
     * @param string $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function getPassword() {
        return $this->password;
    }
}
