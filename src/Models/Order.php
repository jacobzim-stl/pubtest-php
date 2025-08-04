<?php

declare(strict_types=1);

namespace PhpPublishingTest\Models;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Contracts\BaseModel;
use PhpPublishingTest\Models\Order\Status;

/**
 * @phpstan-type order_alias = array{
 *   id?: int,
 *   complete?: bool,
 *   petID?: int,
 *   quantity?: int,
 *   shipDate?: \DateTimeInterface,
 *   status?: Status::*,
 * }
 */
final class Order implements BaseModel
{
    use Model;

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

    public function setID(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setComplete(bool $complete): self
    {
        $this->complete = $complete;

        return $this;
    }

    public function setPetID(int $petID): self
    {
        $this->petID = $petID;

        return $this;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function setShipDate(\DateTimeInterface $shipDate): self
    {
        $this->shipDate = $shipDate;

        return $this;
    }

    /**
     * Order Status.
     *
     * @param Status::* $status
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
