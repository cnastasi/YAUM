<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SimpleUser\Contract;

/**
 *
 * @author christian
 */
interface UserSessionManager
{

    public function store(UserSession $session);

    public function update(UserSession $session);

    public function destroy(UserSession $session);

    public function getUserSession($token);
}
