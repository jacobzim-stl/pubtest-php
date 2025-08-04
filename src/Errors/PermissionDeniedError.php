<?php

namespace PhpPublishingTest\Errors;

class PermissionDeniedError extends APIStatusError
{
    /** @var string */
    protected const DESC = 'PhpPublishingTest Permission Denied Error';
}
