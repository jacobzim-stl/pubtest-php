<?php

declare(strict_types=1);

namespace PhpPublishingTest\Core\Conversion\Concerns;

use PhpPublishingTest\Core\Conversion;
use PhpPublishingTest\Core\Conversion\CoerceState;
use PhpPublishingTest\Core\Conversion\Contracts\Converter;
use PhpPublishingTest\Core\Conversion\Contracts\ConverterSource;
use PhpPublishingTest\Core\Conversion\DumpState;

/**
 * @internal
 */
trait ArrayOf
{
    private readonly null|Converter|ConverterSource|string $type;

    public function __construct(
        null|Converter|ConverterSource|string $type = null,
        null|Converter|ConverterSource|string $enum = null,
        null|Converter|ConverterSource|string $union = null,
        private readonly bool $nullable = false,
    ) {
        $this->type = $type ?? $enum ?? $union;
        assert(!is_null($this->type));
    }

    public function coerce(mixed $value, CoerceState $state): mixed
    {
        if (!is_array($value)) {
            return $value;
        }

        $acc = [];
        foreach ($value as $k => $v) {
            if ($this->nullable && null === $v) {
                ++$state->yes;
                $acc[$k] = null;
            } else {
                $acc[$k] = Conversion::coerce($this->type, value: $v, state: $state);
            }
        }

        return $acc;
    }

    public function dump(mixed $value, DumpState $state): mixed
    {
        if (!is_array($value)) {
            return Conversion::dump_unknown($value, state: $state);
        }

        if (empty($value)) {
            return $this->empty();
        }

        return array_map(fn ($v) => Conversion::dump($this->type, value: $v, state: $state), array: $value);
    }

    private function empty(): array|object // @phpstan-ignore-line
    {
        return (object) [];
    }
}
