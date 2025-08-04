<?php

declare(strict_types=1);

namespace PhpPublishingTest\Responses;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Contracts\BaseModel;

/**
 * @phpstan-type pet_upload_image_response_alias = array{
 *   code?: int, message?: string, type?: string
 * }
 */
final class PetUploadImageResponse implements BaseModel
{
    use Model;

    #[Api(optional: true)]
    public ?int $code;

    #[Api(optional: true)]
    public ?string $message;

    #[Api(optional: true)]
    public ?string $type;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function new(
        ?int $code = null,
        ?string $message = null,
        ?string $type = null
    ): self {
        $obj = new self;

        null !== $code && $obj->code = $code;
        null !== $message && $obj->message = $message;
        null !== $type && $obj->type = $type;

        return $obj;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }
}
