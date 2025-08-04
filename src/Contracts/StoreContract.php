<?php

declare(strict_types=1);

namespace PhpPublishingTest\Contracts;

use PhpPublishingTest\RequestOptions;

interface StoreContract
{
    /**
     * @return array<string, int>
     */
    public function listInventory(
        ?RequestOptions $requestOptions = null
    ): array;
}
