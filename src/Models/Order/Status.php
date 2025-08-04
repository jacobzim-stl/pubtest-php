<?php

declare(strict_types=1);

namespace PhpPublishingTest\Models\Order;

use PhpPublishingTest\Core\Concerns\Enum;
use PhpPublishingTest\Core\Conversion\Contracts\ConverterSource;

/**
 * Order Status.
 *
 * @phpstan-type status_alias = Status::*
 */
final class Status implements ConverterSource
{
    use Enum;

    public const PLACED = 'placed';

    public const APPROVED = 'approved';

    public const DELIVERED = 'delivered';
}
