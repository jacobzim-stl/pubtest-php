<?php

namespace PhpPublishingTest\Errors;

class BadRequestError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'PhpPublishingTest Bad Request Error';
}
