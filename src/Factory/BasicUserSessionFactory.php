<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YAUM\Factory;

use YAUM\Contract\User;
use YAUM\Contract\UserSessionFactory;
use YAUM\Model\BasicUserSession;

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
