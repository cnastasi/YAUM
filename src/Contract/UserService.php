<?php namespace SimpleUser\Contract;

/**
 * Description of UserService
 *
 * @author christian
 */
interface UserService
{

    /**
     * 
     * @param \SimpleUser\Contract\Credential $credential
     * @return string
     */
    public function login(Credential $credential);

    /**
     * 
     * @param string $token
     */
    public function isLogged($token);
}
