<?php

declare(strict_types=1);

namespace PhpPublishingTest\Parameters\Store;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Concerns\Params;
use PhpPublishingTest\Core\Contracts\BaseModel;
use PhpPublishingTest\Parameters\Store\OrderCreateParam\Status;

/**
 * Place a new order in the store.
 *
 * @phpstan-type create_params = array{
 *   id?: int,
 *   complete?: bool,
 *   petID?: int,
 *   quantity?: int,
 *   shipDate?: \DateTimeInterface,
 *   status?: Status::*,
 * }
 */
final class OrderCreateParam implements BaseModel
{
    use Model;
    use Params;

    #[Api(optional: true)]
    public ?int $id;

    #[Api(optional: true)]
    public ?bool $complete;

    #[Api('petId', optional: true)]
    public ?int $petID;

    #[Api(optional: true)]
    public ?int $quantity;

    #[Api(optional: true)]
    public ?\DateTimeInterface $shipDate;

    /**
     * Order Status.
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
    public static function new(
        ?int $id = null,
        ?bool $complete = null,
        ?int $petID = null,
        ?int $quantity = null,
        ?\DateTimeInterface $shipDate = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $complete && $obj->complete = $complete;
        null !== $petID && $obj->petID = $petID;
        null !== $quantity && $obj->quantity = $quantity;
        null !== $shipDate && $obj->shipDate = $shipDate;
        null !== $status && $obj->status = $status;

        return $obj;
    }
}
