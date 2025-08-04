<?php

namespace PhpPublishingTest\Errors;

class InternalServerError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'PhpPublishingTest Internal Server Error';
}
