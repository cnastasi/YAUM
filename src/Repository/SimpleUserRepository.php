<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YAUM\Repository;

use YAUM\Contract\User;
use YAUM\Contract\UserRepository;

/**
 * Description of SimpleUserRepository
 *
 * @author christian
 */
class SimpleUserRepository implements UserRepository
{

    /**
     *
     * @var SimpleRepository
     */
    private $users;

    public function __construct()
    {
        $this->users = new SimpleRepository();
    }

    public function getUserByUsername($username)
    {
        return $this->users->get($username);
    }

    public function save(User $user)
    {
        $this->users->put($user->getUsername(), $user);
    }
}
