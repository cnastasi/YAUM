<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YAUM\Service;

use YAUM\Contract\Credential;
use YAUM\Contract\CredentialChecker;
use YAUM\Contract\User;
use YAUM\Contract\UserRepository;
use YAUM\Exception\IncompatibleModelException;
use YAUM\Exception\UserNotFoundException;
use YAUM\Exception\WrongPasswordException;
use YAUM\Model\BasicCredential;
use YAUM\Model\BasicUser;

/**
 * Description of BasicCredentialChecker
 *
 * @author christian
 */
class BasicCredentialChecker implements CredentialChecker
{

    /**
     *
     * @var UserRepository
     */
    private $userRepository;

    /**
     * 
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * 
     * @param Credential $credential
     * @return User
     */
    public function check(Credential $credential)
    {
        return $this->_check($credential);
    }

    private function _check(BasicCredential $credential)
    {

        $user = $this->userRepository->getUserByUsername($credential->getUsername());

        if (!$user) {
            throw new UserNotFoundException();
        }

        if (!($user instanceof BasicUser)) {
            throw new IncompatibleModelException('SimpleUser\Model\BasicUser', $user);
        }

        /** @var BasicUser $user */
        if ($user->getPassword() !== $credential->getPassword()) {
            throw new WrongPasswordException();
        }

        return $user;
    }
}
