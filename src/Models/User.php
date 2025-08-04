<?php

declare(strict_types=1);

namespace PhpPublishingTest\Models;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Contracts\BaseModel;

/**
 * @phpstan-type user_alias = array{
 *   id?: int,
 *   email?: string,
 *   firstName?: string,
 *   lastName?: string,
 *   password?: string,
 *   phone?: string,
 *   username?: string,
 *   userStatus?: int,
 * }
 */
final class User implements BaseModel
{
    use Model;

    #[Api(optional: true)]
    public ?int $id;

    #[Api(optional: true)]
    public ?string $email;

    #[Api(optional: true)]
    public ?string $firstName;

    #[Api(optional: true)]
    public ?string $lastName;

    #[Api(optional: true)]
    public ?string $password;

    #[Api(optional: true)]
    public ?string $phone;

    #[Api(optional: true)]
    public ?string $username;

    /**
     * User Status.
     */
    #[Api(optional: true)]
    public ?int $userStatus;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function new(
        ?int $id = null,
        ?string $email = null,
        ?string $firstName = null,
        ?string $lastName = null,
        ?string $password = null,
        ?string $phone = null,
        ?string $username = null,
        ?int $userStatus = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $email && $obj->email = $email;
        null !== $firstName && $obj->firstName = $firstName;
        null !== $lastName && $obj->lastName = $lastName;
        null !== $password && $obj->password = $password;
        null !== $phone && $obj->phone = $phone;
        null !== $username && $obj->username = $username;
        null !== $userStatus && $obj->userStatus = $userStatus;

        return $obj;
    }

    public function setID(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * User Status.
     */
    public function setUserStatus(int $userStatus): self
    {
        $this->userStatus = $userStatus;

        return $this;
    }
}
