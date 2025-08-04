<?php

declare(strict_types=1);

namespace PhpPublishingTest\Parameters;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Concerns\Params;
use PhpPublishingTest\Core\Contracts\BaseModel;
use PhpPublishingTest\Core\Conversion\ListOf;

/**
 * Multiple tags can be provided with comma separated strings. Use tag1, tag2, tag3 for testing.
 *
 * @phpstan-type find_by_tags_params = array{tags?: list<string>}
 */
final class PetFindByTagsParam implements BaseModel
{
    use Model;
    use Params;

    /**
     * Tags to filter by.
     *
     * @var null|list<string> $tags
     */
    #[Api(type: new ListOf('string'), optional: true)]
    public ?array $tags;

    public function __construct()
    {
        self::introspect();
        $this->unsetOptionalProperties();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param null|list<string> $tags
     */
    public static function new(?array $tags = null): self
    {
        $obj = new self;

        null !== $tags && $obj->tags = $tags;

        return $obj;
    }
}
