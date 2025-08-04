<?php

declare(strict_types=1);

namespace PhpPublishingTest\Parameters;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Concerns\Params;
use PhpPublishingTest\Core\Contracts\BaseModel;

/**
 * uploads an image.
 *
 * @phpstan-type upload_image_params = array{additionalMetadata?: string}
 */
final class PetUploadImageParam implements BaseModel
{
    use Model;
    use Params;

    /**
     * Additional Metadata.
     */
    #[Api(optional: true)]
    public ?string $additionalMetadata;

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
    public static function new(?string $additionalMetadata = null): self
    {
        $obj = new self;

        null !== $additionalMetadata && $obj->additionalMetadata = $additionalMetadata;

        return $obj;
    }
}
