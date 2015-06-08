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
interface UserSession extends Entity
{
    /**
     * @return User
     */
    public function getUser ();
    
    /**
     * @return string
     */
    public function getToken();
}
