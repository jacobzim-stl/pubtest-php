<?php

declare(strict_types=1);

namespace PhpPublishingTest\Core\Conversion;

use PhpPublishingTest\Core\Conversion\Concerns\ArrayOf;
use PhpPublishingTest\Core\Conversion\Contracts\Converter;

/**
 * @internal
 */
final class MapOf implements Converter
{
    use ArrayOf;
}
