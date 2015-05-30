<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YAUM\Contract;

/**
 *
 * @author christian
 */
interface UserSessionFactory
{
    /**
     * 
     * @param User $user
     * @return UserSession
     */
    public function create(User $user);
}
