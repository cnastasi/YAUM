<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YAUM\User\Session;

use YAUM\User\User;

/**
 * Description of UserSessionFactory
 *
 * @author christian
 */
class BasicUserSessionFactory implements UserSessionFactory
{
    /**
     * @param User $user
     * @return BasicUserSession
     */
    public function create(User $user)
    {
        return new BasicUserSession($user);
    }

}
