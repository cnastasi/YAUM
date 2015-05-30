<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SimpleUser\Service;

use SimpleUser\Contract\UserSession;
use SimpleUser\Contract\UserSessionManager;
use SimpleUser\Contract\UserSessionRepository;

/**
 * Description of BasicUserSessionManager
 *
 * @author christian
 */
class BasicUserSessionManager implements UserSessionManager
{

    /**
     *
     * @var UserSessionRepository
     */
    private $userSessionRepository;

    public function __construct(UserSessionRepository $userSessionRepository)
    {
        $this->userSessionRepository = $userSessionRepository;
    }

    public function store(UserSession $session)
    {
        $this->userSessionRepository->save($session);
    }

    public function destroy(UserSession $session)
    {
        $this->userSessionRepository->remove($session);
    }

    public function update(UserSession $session)
    {
        $this->userSessionRepository->save($session);
    }

    public function getUserSession($token)
    {
        return $this->userSessionRepository->getUserSession($token);
    }
}
