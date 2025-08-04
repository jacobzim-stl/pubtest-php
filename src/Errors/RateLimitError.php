<?php

namespace PhpPublishingTest\Errors;

class RateLimitError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'PhpPublishingTest Rate Limit Error';
}
