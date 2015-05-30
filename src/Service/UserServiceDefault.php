<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SimpleUser\Service;

use SimpleUser\Contract\Credential;
use SimpleUser\Contract\CredentialChecker;
use SimpleUser\Contract\UserService;
use SimpleUser\Contract\UserSessionFactory;
use SimpleUser\Contract\UserSessionManager;

/**
 * Description of UserServiceDefault
 *
 * @author christian
 */
class UserServiceDefault implements UserService
{

    /**
     *
     * @var CredentialChecker
     */
    private $credentialChecker;

    /**
     *
     * @var UserSessionManager 
     */
    private $userSessionManager;

    /**
     *
     * @var UserSessionFactory 
     */
    private $userSessionFactory;

    public function __construct(
    CredentialChecker $credentialChecker,
    UserSessionFactory $userSessionFactory,
    UserSessionManager $userSessionManager
    )
    {
        $this->credentialChecker  = $credentialChecker;
        $this->userSessionManager = $userSessionManager;
        $this->userSessionFactory = $userSessionFactory;
    }

    public function login(Credential $credential)
    {
        $user    = $this->credentialChecker->check($credential);
        $session = $this->userSessionFactory->create($user);

        $this->userSessionManager->store($session);

        return $session->getToken();
    }

    public function isLogged($token)
    {
        $session = $this->userSessionManager->getUserSession($token);

        return $session !== null;
    }
}
