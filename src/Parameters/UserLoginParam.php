<?php

declare(strict_types=1);

namespace PhpPublishingTest\Parameters;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Concerns\Params;
use PhpPublishingTest\Core\Contracts\BaseModel;

/**
 * Logs user into the system.
 *
 * @phpstan-type login_params = array{password?: string, username?: string}
 */
final class UserLoginParam implements BaseModel
{
    use Model;
    use Params;

    /**
     * The password for login in clear text.
     */
    #[Api(optional: true)]
    public ?string $password;

    /**
     * The user name for login.
     */
    #[Api(optional: true)]
    public ?string $username;

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
        ?string $password = null,
        ?string $username = null
    ): self {
        $obj = new self;

        null !== $password && $obj->password = $password;
        null !== $username && $obj->username = $username;

        return $obj;
    }
}
