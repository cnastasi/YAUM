<?php namespace SimpleUser\Contract;

/**
 *
 * @author christian
 */
interface User
{

    /**
     * @return string 
     */
    public function getUsername();

    /**
     * 
     * @param string $username
     */
    public function setUsername($username);

    /**
     * @return string 
     */
    public function getName();

    /**
     * 
     * @param string $name
     */
    public function setName($name);
}
