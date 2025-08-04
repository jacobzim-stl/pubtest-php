<?php

declare(strict_types=1);

namespace PhpPublishingTest\Parameters;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Concerns\Params;
use PhpPublishingTest\Core\Contracts\BaseModel;
use PhpPublishingTest\Core\Conversion\ListOf;
use PhpPublishingTest\Models\User;

/**
 * Creates list of users with given input array.
 *
 * @phpstan-type create_with_list_params = array{items?: list<User>}
 */
final class UserCreateWithListParam implements BaseModel
{
    use Model;
    use Params;

    /** @var null|list<User> $items */
    #[Api(type: new ListOf(User::class), optional: true)]
    public ?array $items;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param null|list<User> $items
     */
    public static function new(?array $items = null): self
    {
        $obj = new self;

        null !== $items && $obj->items = $items;

        return $obj;
    }
}
