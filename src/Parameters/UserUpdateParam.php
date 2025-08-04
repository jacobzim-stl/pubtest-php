<?php

declare(strict_types=1);

namespace PhpPublishingTest\Parameters;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Concerns\Params;
use PhpPublishingTest\Core\Contracts\BaseModel;

/**
 * This can only be done by the logged in user.
 *
 * @phpstan-type update_params1 = array{
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
final class UserUpdateParam implements BaseModel
{
    use Model;
    use Params;

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
}
