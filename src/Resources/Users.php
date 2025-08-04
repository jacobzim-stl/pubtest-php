<?php

declare(strict_types=1);

namespace PhpPublishingTest\Resources;

use PhpPublishingTest\Client;
use PhpPublishingTest\Contracts\UsersContract;
use PhpPublishingTest\Core\Conversion;
use PhpPublishingTest\Models\User;
use PhpPublishingTest\Parameters\UserCreateParam;
use PhpPublishingTest\Parameters\UserCreateWithListParam;
use PhpPublishingTest\Parameters\UserLoginParam;
use PhpPublishingTest\Parameters\UserUpdateParam;
use PhpPublishingTest\RequestOptions;

final class Users implements UsersContract
{
    public function __construct(private Client $client) {}

    /**
     * This can only be done by the logged in user.
     *
     * @param array{
     *   id?: int,
     *   email?: string,
     *   firstName?: string,
     *   lastName?: string,
     *   password?: string,
     *   phone?: string,
     *   username?: string,
     *   userStatus?: int,
     * }|UserCreateParam $params
     */
    public function create(
        array|UserCreateParam $params,
        ?RequestOptions $requestOptions = null
    ): User {
        [$parsed, $options] = UserCreateParam::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'user',
            body: (object) $parsed,
            options: $options
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(User::class, value: $resp);
    }

    /**
     * Get user by user name.
     */
    public function retrieve(
        string $username,
        ?RequestOptions $requestOptions = null
    ): User {
        $resp = $this->client->request(
            method: 'get',
            path: ['user/%1$s', $username],
            options: $requestOptions
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(User::class, value: $resp);
    }

    /**
     * This can only be done by the logged in user.
     *
     * @param array{
     *   id?: int,
     *   email?: string,
     *   firstName?: string,
     *   lastName?: string,
     *   password?: string,
     *   phone?: string,
     *   username?: string,
     *   userStatus?: int,
     * }|UserUpdateParam $params
     */
    public function update(
        string $existingUsername,
        array|UserUpdateParam $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = UserUpdateParam::parseRequest(
            $params,
            $requestOptions
        );

        return $this->client->request(
            method: 'put',
            path: ['user/%1$s', $existingUsername],
            body: (object) $parsed,
            options: $options,
        );
    }

    /**
     * This can only be done by the logged in user.
     */
    public function delete(
        string $username,
        ?RequestOptions $requestOptions = null
    ): mixed {
        return $this->client->request(
            method: 'delete',
            path: ['user/%1$s', $username],
            options: $requestOptions
        );
    }

    /**
     * Creates list of users with given input array.
     *
     * @param array{items?: list<User>}|UserCreateWithListParam $params
     */
    public function createWithList(
        array|UserCreateWithListParam $params,
        ?RequestOptions $requestOptions = null,
    ): User {
        [$parsed, $options] = UserCreateWithListParam::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'user/createWithList',
            body: $parsed['items'],
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(User::class, value: $resp);
    }

    /**
     * Logs user into the system.
     *
     * @param array{password?: string, username?: string}|UserLoginParam $params
     */
    public function login(
        array|UserLoginParam $params,
        ?RequestOptions $requestOptions = null
    ): string {
        [$parsed, $options] = UserLoginParam::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'get',
            path: 'user/login',
            query: $parsed,
            options: $options
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce('string', value: $resp);
    }

    /**
     * Logs out current logged in user session.
     */
    public function logout(?RequestOptions $requestOptions = null): mixed
    {
        return $this->client->request(
            method: 'get',
            path: 'user/logout',
            options: $requestOptions
        );
    }
}
