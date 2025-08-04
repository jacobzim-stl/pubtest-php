<?php

declare(strict_types=1);

namespace PhpPublishingTest\Core\Concerns;

use PhpPublishingTest\Core\Conversion\Contracts\Converter;
use PhpPublishingTest\Core\Conversion\EnumOf;

trait Enum
{
    private static Converter $converter;

    public static function converter(): Converter
    {
        if (isset(static::$converter)) {
            return static::$converter;
        }

        $class = new \ReflectionClass(static::class);
        $acc = [];
        foreach ($class->getReflectionConstants() as $constant) {
            if ($constant->isPublic()) {
                array_push($acc, $constant->getValue());
            }
        }

        return static::$converter = new EnumOf($acc); // @phpstan-ignore-line
    }
}
