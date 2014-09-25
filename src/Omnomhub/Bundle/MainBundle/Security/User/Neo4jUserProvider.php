<?php

namespace Omnomhub\Bundle\MainBundle\Security\User;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Omnomhub\Bundle\MainBundle\Model\User\User;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class Neo4jUserProvider implements UserProviderInterface
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function loadUserByUsername($username)
    {
        $queryString = "MATCH (user {username: {username}}) return user";

        $query = new \Everyman\Neo4j\Cypher\Query($this->client, $queryString, array('username' => $username));
        $result = $query->getResultSet();

        if(empty($result[0])) {
            throw new UsernameNotFoundException(
                sprintf('Username "%s" does not exist.', $username)
            );
        }

        return $this->getUserFromResult($result);
    }

    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf('Instances of "%s" are not supported.', get_class($user))
            );
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $class === "Omnomhub\Bundle\MainBundle\Model\User\User";
    }

    protected function getUserFromResult($result)
    {
        $username = $result[0]['user']->getProperty('username');
        $email = $result[0]['user']->getProperty('email');
        $password = $result[0]['user']->getProperty('password');
        $salt = $result[0]['user']->getProperty('salt');
        $roles = [$result[0]['user']->getProperty('roles')];;

        return $user = new User($username, $email, $password, $salt, $roles);
    }
}