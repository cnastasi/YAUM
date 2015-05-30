<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SimpleUser\Factory;

use SimpleUser\Contract\User;
use SimpleUser\Contract\UserSessionFactory;
use SimpleUser\Model\BasicUserSession;

/**
 * Description of UserSessionFactory
 *
 * @author christian
 */
class BasicUserSessionFactory implements UserSessionFactory
{
    public function create(User $user)
    {
        return new BasicUserSession($user);
    }

}
