<?php

declare(strict_types=1);

namespace PhpPublishingTest\Parameters\PetFindByStatusParam;

use PhpPublishingTest\Core\Concerns\Enum;
use PhpPublishingTest\Core\Conversion\Contracts\ConverterSource;

/**
 * Status values that need to be considered for filter.
 *
 * @phpstan-type status_alias = Status::*
 */
final class Status implements ConverterSource
{
    use Enum;

    public const AVAILABLE = 'available';

    public const PENDING = 'pending';

    public const SOLD = 'sold';
}
