<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace YAUM\User;

/**
 * Description of WrongPasswordException
 *
 * @author christian
 */
class WrongPasswordException extends \Exception
{

    public function __construct()
    {
        parent::__construct('Wrong password');
    }
}
