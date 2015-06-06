<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YAUM\Test\Service;

use PHPUnit_Framework_TestCase;
use YAUM\Factory\BasicUserSessionFactory;
use YAUM\Model\BasicCredential;
use YAUM\Model\BasicUser;
use YAUM\Repository\SimpleUserRepository;
use YAUM\Repository\SimpleUserSessionRepository;
use YAUM\Service\BasicCredentialChecker;
use YAUM\Service\BasicUserSessionManager;
use YAUM\Service\UserServiceDefault;

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
     * @expectedException \YAUM\Exception\UserNotFoundException
     */
    public function shouldNotLoginWithWrongUsername()
    {
        $credential = new BasicCredential('wrongUsername', $this->defaultPassword);

        $token = $this->service->login($credential);
    }

    /**
     * @test
     * @expectedException \YAUM\Exception\WrongPasswordException
     */
    public function shouldNotLoginWithWrongPassword()
    {
        $credential = new BasicCredential($this->defaultUsername, 'wrong password');

        $token = $this->service->login($credential);
    }

    /**
     * @test
     */
    public function shouldSignup()
    {
        $this->markTestSkipped();
    }

    /**
     * @test
     */
    public function shouldNotSignup()
    {
        $this->markTestSkipped();
    }

    /**
     * @test
     */
    public function shouldLogout()
    {
        $this->markTestSkipped();
    }

    /**
     * @test
     */
    public function shouldChangeThePassword()
    {
        $this->markTestSkipped();
    }

    /**
     * @test
     */
    public function shouldRestoreThePassword()
    {
        $this->markTestSkipped();
    }
}
