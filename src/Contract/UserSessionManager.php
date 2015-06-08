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
interface UserSessionManager
{

    /**
     * @param UserSession $session
     */
    public function store(UserSession $session);

    /**
     * @param UserSession $session
     */
    public function update(UserSession $session);

    /**
     * @param UserSession $session
     */
    public function destroy(UserSession $session);

    /**
     * @param $token
     * @return UserSession
     */
    public function getUserSession($token);
}
