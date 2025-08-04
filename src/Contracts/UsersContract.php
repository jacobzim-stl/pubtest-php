<?php

declare(strict_types=1);

namespace PhpPublishingTest\Contracts;

use PhpPublishingTest\Models\User;
use PhpPublishingTest\Parameters\UserCreateParam;
use PhpPublishingTest\Parameters\UserCreateWithListParam;
use PhpPublishingTest\Parameters\UserLoginParam;
use PhpPublishingTest\Parameters\UserUpdateParam;
use PhpPublishingTest\RequestOptions;

interface UsersContract
{
    /**
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
    ): User;

    public function retrieve(
        string $username,
        ?RequestOptions $requestOptions = null
    ): User;

    /**
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
    ): mixed;

    public function delete(
        string $username,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @param array{items?: list<User>}|UserCreateWithListParam $params
     */
    public function createWithList(
        array|UserCreateWithListParam $params,
        ?RequestOptions $requestOptions = null,
    ): User;

    /**
     * @param array{password?: string, username?: string}|UserLoginParam $params
     */
    public function login(
        array|UserLoginParam $params,
        ?RequestOptions $requestOptions = null
    ): string;

    public function logout(
        ?RequestOptions $requestOptions = null
    ): mixed;
}
