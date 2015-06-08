<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YAUM\Repository;

use YAUM\Contract\UserSession;
use YAUM\Contract\UserSessionRepository;

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
        $this->sessions->put($session);
    }

    public function getUserSession($token)
    {
        return $this->sessions->getByCallback(
            function (UserSession $userSession) use ($token) {
                return $userSession->getToken() === $token;
            }
        );
    }

    public function remove(UserSession $session)
    {
        $this->sessions->remove($session->getId());
    }
}
