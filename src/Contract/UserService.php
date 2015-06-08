<?php namespace YAUM\Contract;

/**
 * Description of UserService
 *
 * @author christian
 */
interface UserService
{

    /**
     * 
     * @param Credential $credential
     * @return string
     */
    public function login(Credential $credential);

    /**
     * 
     * @param string $token
     */
    public function isLogged($token);
}
