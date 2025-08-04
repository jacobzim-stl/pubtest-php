<?php

declare(strict_types=1);

namespace PhpPublishingTest\Parameters;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Concerns\Params;
use PhpPublishingTest\Core\Contracts\BaseModel;

/**
 * Updates a pet in the store with form data.
 *
 * @phpstan-type update_by_id_params = array{name?: string, status?: string}
 */
final class PetUpdateByIDParam implements BaseModel
{
    use Model;
    use Params;

    /**
     * Name of pet that needs to be updated.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Status of pet that needs to be updated.
     */
    #[Api(optional: true)]
    public ?string $status;

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
        ?string $name = null,
        ?string $status = null
    ): self {
        $obj = new self;

        null !== $name && $obj->name = $name;
        null !== $status && $obj->status = $status;

        return $obj;
    }
}
