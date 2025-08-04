<?php

declare(strict_types=1);

namespace PhpPublishingTest\Resources;

use PhpPublishingTest\Client;
use PhpPublishingTest\Contracts\StoreContract;
use PhpPublishingTest\Core\Conversion;
use PhpPublishingTest\Core\Conversion\MapOf;
use PhpPublishingTest\RequestOptions;
use PhpPublishingTest\Resources\Store\Orders;

final class Store implements StoreContract
{
    public Orders $orders;

    public function __construct(private Client $client)
    {
        $this->orders = new Orders($this->client);
    }

    /**
     * Returns a map of status codes to quantities.
     *
     * @return array<string, int>
     */
    public function listInventory(?RequestOptions $requestOptions = null): array
    {
        $resp = $this->client->request(
            method: 'get',
            path: 'store/inventory',
            options: $requestOptions
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(new MapOf('string'), value: $resp);
    }
}
