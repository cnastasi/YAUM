<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YAUM\Test\Service;

use PHPUnit_Framework_TestCase;
use YAUM\User\BasicUser;
use YAUM\User\Credential\BasicCredential;
use YAUM\User\Credential\BasicCredentialChecker;
use YAUM\User\Credential\CredentialChecker;
use YAUM\User\Session\BasicUserSessionFactory;
use YAUM\User\Session\BasicUserSessionManager;
use YAUM\User\Session\SimpleUserSessionRepository;
use YAUM\User\Session\UserSessionFactory;
use YAUM\User\Session\UserSessionManager;
use YAUM\User\Session\UserSessionRepository;
use YAUM\User\SimpleUserRepository;
use YAUM\User\User;
use YAUM\User\UserRepository;
use YAUM\User\UserService;
use YAUM\User\UserServiceDefault;

/**
 * Description of UserServiceTest
 *
 * @author christian
 */
class UserServiceTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @var UserSessionRepository
     */
    private $sessionRepository;

    /**
     * @var CredentialChecker
     */
    private $credentialChecker;

    /**
     * @var UserSessionManager
     */
    private $sessionManager;

    /**
     * @var UserSessionFactory
     */
    private $userSessionFactory;

    /**
     * @var UserService
     */
    private $service;

    /**
     * @var string
     */
    private $defaultName;

    /**
     * @var string
     */
    private $defaultUsername;

    /**
     * @var string
     */
    private $defaultPassword;

    /**
     * @var User
     */
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

        static::assertTrue($this->service->isLogged($token));
    }

    /**
     * @test
     * @expectedException \YAUM\User\UserNotFoundException
     */
    public function shouldNotLoginWithWrongUsername()
    {
        $credential = new BasicCredential('wrongUsername', $this->defaultPassword);

        $token = $this->service->login($credential);
    }

    /**
     * @test
     * @expectedException \YAUM\User\WrongPasswordException
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
        static::markTestSkipped();
    }

    /**
     * @test
     */
    public function shouldNotSignup()
    {
        static::markTestSkipped();
    }

    /**
     * @test
     */
    public function shouldLogout()
    {
        static::markTestSkipped();
    }

    /**
     * @test
     */
    public function shouldChangeThePassword()
    {
        static::markTestSkipped();
    }

    /**
     * @test
     */
    public function shouldRestoreThePassword()
    {
        static::markTestSkipped();
    }
}
