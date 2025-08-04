<?php

declare(strict_types=1);

namespace PhpPublishingTest\Parameters;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Concerns\Params;
use PhpPublishingTest\Core\Contracts\BaseModel;
use PhpPublishingTest\Parameters\PetFindByStatusParam\Status;

/**
 * Multiple status values can be provided with comma separated strings.
 *
 * @phpstan-type find_by_status_params = array{status?: Status::*}
 */
final class PetFindByStatusParam implements BaseModel
{
    use Model;
    use Params;

    /**
     * Status values that need to be considered for filter.
     *
     * @var null|Status::* $status
     */
    #[Api(enum: Status::class, optional: true)]
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
     *
     * @param null|Status::* $status
     */
    public static function new(?string $status = null): self
    {
        $obj = new self;

        null !== $status && $obj->status = $status;

        return $obj;
    }
}
