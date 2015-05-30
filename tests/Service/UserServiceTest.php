<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SimpleUser\Test\Service;

use PHPUnit_Framework_TestCase;
use SimpleUser\Factory\BasicUserSessionFactory;
use SimpleUser\Model\BasicCredential;
use SimpleUser\Model\BasicUser;
use SimpleUser\Repository\SimpleUserRepository;
use SimpleUser\Repository\SimpleUserSessionRepository;
use SimpleUser\Service\BasicCredentialChecker;
use SimpleUser\Service\BasicUserSessionManager;
use SimpleUser\Service\UserServiceDefault;

/**
 * Description of UserServiceTest
 *
 * @author christian
 */
class UserServiceTest extends PHPUnit_Framework_TestCase
{

    private $userRepository;
    private $sessionRepository;
    private $credentialChecker;
    private $sessionManager;
    private $userSessionFactory;
    private $service;
    private $defaultName;
    private $defaultUsername;
    private $defaultPassword;
    private $defaultUser;

    protected function setUp()
    {
        parent::setUp();

        $this->userRepository     = new SimpleUserRepository();
        $this->sessionRepository  = new SimpleUserSessionRepository();
        $this->credentialChecker  = new BasicCredentialChecker($this->userRepository);
        $this->sessionManager     = new BasicUserSessionManager($this->sessionRepository);
        $this->userSessionFactory = new BasicUserSessionFactory();
        $this->service            = new UserServiceDefault($this->credentialChecker, $this->userSessionFactory, $this->sessionManager);

        $this->defaultName     = 'Pippo';
        $this->defaultUsername = 'pippo';
        $this->defaultPassword = 'P455W0RD';

        $this->defaultUser = new BasicUser($this->defaultName, $this->defaultUsername, $this->defaultPassword);

        $this->userRepository->save($this->defaultUser);
    }

    /**
     * @test
     */
    public function shouldLoginTheUser()
    {
        $credential = new BasicCredential($this->defaultUsername, $this->defaultPassword);

        $token = $this->service->login($credential);

        $this->assertTrue($this->service->isLogged($token));
    }

    /**
     * @test
     * @expectedException \SimpleUser\Exception\UserNotFoundException
     */
    public function shouldNotLoginWithWrongUsername()
    {
        $credential = new BasicCredential('wrongUsername', $this->defaultPassword);

        $token = $this->service->login($credential);
    }

    /**
     * @test
     * @expectedException \SimpleUser\Exception\WrongPasswordException
     */
    public function shouldNotLoginWithWrongPassword()
    {
        $credential = new BasicCredential($this->defaultUsername, 'wrong password');

        $token = $this->service->login($credential);
    }
}
