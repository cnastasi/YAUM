<?php namespace YAUM\User;

/**
 * Description of UserService
 *
 * @author christian
 */
interface UserService
{

    /**
     * 
     * @param mixed $credential
     * @return string
     */
    public function login($credential);

    /**
     * 
     * @param string $token
     */
    public function isLogged($token);
}
