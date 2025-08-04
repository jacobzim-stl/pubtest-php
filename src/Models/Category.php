<?php

declare(strict_types=1);

namespace PhpPublishingTest\Models;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Contracts\BaseModel;

/**
 * @phpstan-type category_alias = array{id?: int, name?: string}
 */
final class Category implements BaseModel
{
    use Model;

    #[Api(optional: true)]
    public ?int $id;

    #[Api(optional: true)]
    public ?string $name;

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
    public static function new(?int $id = null, ?string $name = null): self
    {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    public function setID(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
