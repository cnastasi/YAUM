<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YAUM\User;

use YAUM\User\Credential\CredentialChecker;
use YAUM\User\Session\UserSessionFactory;
use YAUM\User\Session\UserSessionManager;

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

    /**
     * @param CredentialChecker $credentialChecker
     * @param UserSessionFactory $userSessionFactory
     * @param UserSessionManager $userSessionManager
     */
    public function __construct(
        CredentialChecker $credentialChecker,
        UserSessionFactory $userSessionFactory,
        UserSessionManager $userSessionManager
    ) {
        $this->credentialChecker  = $credentialChecker;
        $this->userSessionManager = $userSessionManager;
        $this->userSessionFactory = $userSessionFactory;
    }

    /**
     * @param mixed $credential
     * @return string
     */
    public function login($credential)
    {
        $user    = $this->credentialChecker->check($credential);
        $session = $this->userSessionFactory->create($user);

        $this->userSessionManager->store($session);

        return $session->getToken();
    }

    /**
     * @param string $token
     * @return bool
     */
    public function isLogged($token)
    {
        $session = $this->userSessionManager->getUserSession($token);

        return $session !== null;
    }
    }
