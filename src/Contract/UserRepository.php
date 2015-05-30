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
interface UserRepository
{
    /**
     * 
     * @param string $username
     * @return User 
     */
    public function getUserByUsername($username);
    
    public function save(User $user);
}
