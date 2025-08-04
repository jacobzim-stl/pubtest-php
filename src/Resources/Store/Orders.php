<?php

declare(strict_types=1);

namespace PhpPublishingTest\Resources\Store;

use PhpPublishingTest\Client;
use PhpPublishingTest\Contracts\Store\OrdersContract;
use PhpPublishingTest\Core\Conversion;
use PhpPublishingTest\Models\Order;
use PhpPublishingTest\Parameters\Store\OrderCreateParam;
use PhpPublishingTest\Parameters\Store\OrderCreateParam\Status;
use PhpPublishingTest\RequestOptions;

final class Orders implements OrdersContract
{
    public function __construct(private Client $client) {}

    /**
     * Place a new order in the store.
     *
     * @param array{
     *   id?: int,
     *   complete?: bool,
     *   petID?: int,
     *   quantity?: int,
     *   shipDate?: \DateTimeInterface,
     *   status?: Status::*,
     * }|OrderCreateParam $params
     */
    public function create(
        array|OrderCreateParam $params,
        ?RequestOptions $requestOptions = null
    ): Order {
        [$parsed, $options] = OrderCreateParam::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'store/order',
            body: (object) $parsed,
            options: $options,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Order::class, value: $resp);
    }

    /**
     * For valid response try integer IDs with value <= 5 or > 10. Other values will generate exceptions.
     */
    public function retrieve(
        int $orderID,
        ?RequestOptions $requestOptions = null
    ): Order {
        $resp = $this->client->request(
            method: 'get',
            path: ['store/order/%1$s', $orderID],
            options: $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Order::class, value: $resp);
    }

    /**
     * For valid response try integer IDs with value < 1000. Anything above 1000 or nonintegers will generate API errors.
     */
    public function delete(
        int $orderID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        return $this->client->request(
            method: 'delete',
            path: ['store/order/%1$s', $orderID],
            options: $requestOptions,
        );
    }
}
