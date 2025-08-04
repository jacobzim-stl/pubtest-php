<?php

declare(strict_types=1);

namespace PhpPublishingTest\Contracts\Store;

use PhpPublishingTest\Models\Order;
use PhpPublishingTest\Parameters\Store\OrderCreateParam;
use PhpPublishingTest\Parameters\Store\OrderCreateParam\Status;
use PhpPublishingTest\RequestOptions;

interface OrdersContract
{
    /**
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
    ): Order;

    public function retrieve(
        int $orderID,
        ?RequestOptions $requestOptions = null
    ): Order;

    public function delete(
        int $orderID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
