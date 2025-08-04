<?php

declare(strict_types=1);

namespace PhpPublishingTest\Core\Concerns;

use PhpPublishingTest\Core\BaseClient;
use PhpPublishingTest\Core\Pagination\PageRequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * @internal
 */
interface Page
{
    public function __construct(
        BaseClient $client,
        PageRequestOptions $options,
        ResponseInterface $response,
        mixed $body,
    );
}
