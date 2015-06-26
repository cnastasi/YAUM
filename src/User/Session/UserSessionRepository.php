<?php namespace YAUM\User\Session;

/**
 *
 * @author christian
 */
interface UserSessionRepository
{

    /**
     * 
     * @param UserSession $session
     */
    public function remove(UserSession $session);

    /**
     * 
     * @param UserSession $session
     */
    public function save(UserSession $session);

    /**
     * 
     * @param string $token
     * @return UserSession
     */
    public function getUserSession($token);
}
