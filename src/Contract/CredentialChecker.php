<?php namespace SimpleUser\Contract;

/**
 * Description of CredentialChecker
 *
 * @author christian
 */
interface CredentialChecker
{

    /**
     * 
     * @param Credential $credential
     * @return User 
     */
    public function check(Credential $credential);
}
