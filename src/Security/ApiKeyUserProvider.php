<?php

declare(strict_types=1);

namespace App\Security;

use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;

class ApiKeyUserProvider implements UserProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function getUsernameForApiKey($apiKey)
    {
        $username = $apiKey;

        return $username;
    }

    /**
     * {@inheritdoc}
     */
    public function loadUserByUsername($username)
    {
        return new User(
            $username,
            null,
            // the roles for the user - you may choose to determine
            // these dynamically somehow based on the user
            ['ROLE_API']
        );
    }

    /**
     * {@inheritdoc}
     */
    public function refreshUser(UserInterface $user)
    {
        throw new UnsupportedUserException();
    }

    /**
     * {@inheritdoc}
     */
    public function supportsClass($class)
    {
        return User::class === $class;
    }
}
