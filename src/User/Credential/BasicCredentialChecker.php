<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YAUM\User\Credential;

use YAUM\IncompatibleModelException;
use YAUM\User\BasicUser;
use YAUM\User\User;
use YAUM\User\UserNotFoundException;
use YAUM\User\UserRepository;
use YAUM\User\WrongPasswordException;

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
     * @param mixed $credential
     * @return User
     */
    public function check($credential)
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
            throw new IncompatibleModelException(BasicUser::class, $user);
        }

        /** @var BasicUser $user */
        if ($user->getPassword() !== $credential->getPassword()) {
            throw new WrongPasswordException();
        }

        return $user;
    }
}
