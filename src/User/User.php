<?php namespace YAUM\User;

use YAUM\Entity;

/**
 *
 * @author christian
 */
interface User extends Entity
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
