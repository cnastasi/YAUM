<?php

namespace YAUM\User\Credential;

use YAUM\User\User;

/**
 * Description of CredentialChecker
 *
 * @author christian
 */
interface CredentialChecker
{

    /**
     * 
     * @param mixed $credential
     * @return User
     */
    public function check($credential);
}
