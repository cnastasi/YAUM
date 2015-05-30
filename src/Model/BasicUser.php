<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SimpleUser\Model;

use SimpleUser\Contract\User;

/**
 * Description of BasicUser
 *
 * @author christian
 */
class BasicUser implements User
{

    /**
     *
     * @var string 
     */
    private $name;

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
     * @param string $name
     * @param string $username
     * @param string $password
     */
    public function __construct($name = null, $username = null, $password = null)
    {
        $this->name     = $name;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    /**
     * 
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * 
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * 
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
}
