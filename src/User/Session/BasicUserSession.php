<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace YAUM\User\Session;

use YAUM\User\User;

/**
 * Description of BasicUserSession
 *
 * @author christian
 */
class BasicUserSession implements UserSession
{

    /**
     * @var mixed
     */
    private $id;

    /**
     *
     * @var mixed $token
     */
    private $token;

    /**
     *
     * @var User
     */
    private $user;

    /**
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user  = $user;
        $this->token = $this->generateToken($user->getUsername());
    }

    public function getToken()
    {
        return $this->token;
    }

    public function getUser()
    {
        return $this->user;
    }

    private function generateToken($username)
    {
        $now        = microtime(true);
        $salt       = mt_rand(0, 100000);
        $baseString = $username . $now . $salt;

        return sha1(md5($baseString));
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}
