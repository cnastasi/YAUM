<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace SimpleUser\Service;

use SimpleUser\Contract\Credential;
use SimpleUser\Contract\CredentialChecker;
use SimpleUser\Contract\User;
use SimpleUser\Contract\UserRepository;
use SimpleUser\Exception\IncompatibleModelException;
use SimpleUser\Exception\UserNotFoundException;
use SimpleUser\Exception\WrongPasswordException;
use SimpleUser\Model\BasicCredential;
use SimpleUser\Model\BasicUser;

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
