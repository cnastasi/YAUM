<?php namespace YAUM\User;

/**
 * Description of UserNotExistException
 *
 * @author christian
 */
class UserNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct('User not found');
    }
}
