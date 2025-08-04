<?php

declare(strict_types=1);

namespace PhpPublishingTest\Core\Conversion\Contracts;

use PhpPublishingTest\Core\Conversion\CoerceState;
use PhpPublishingTest\Core\Conversion\DumpState;

/**
 * @internal
 */
interface Converter
{
    /**
     * @internal
     */
    public function coerce(mixed $value, CoerceState $state): mixed;

    /**
     * @internal
     */
    public function dump(mixed $value, DumpState $state): mixed;
}
