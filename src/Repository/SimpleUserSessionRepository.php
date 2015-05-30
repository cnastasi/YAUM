<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SimpleUser\Repository;

use SimpleUser\Contract\UserSessionRepository;
use SimpleUser\Contract\UserSession;

/**
 * Description of SimpleSessionRepository
 *
 * @author christian
 */
class SimpleUserSessionRepository implements UserSessionRepository
{

    /**
     *
     * @var SimpleRepository
     */
    private $sessions;

    public function __construct()
    {
        $this->sessions = new SimpleRepository();
    }

    public function save(UserSession $session)
    {
        $this->sessions->put($session->getToken(), $session);
    }

    public function getUserSession($token)
    {
        return $this->sessions->get($token);
    }

    public function remove(UserSession $session)
    {
        $this->sessions->remove($session->getToken());
    }
}
