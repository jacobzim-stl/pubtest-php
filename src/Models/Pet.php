<?php

declare(strict_types=1);

namespace PhpPublishingTest\Models;

use PhpPublishingTest\Core\Attributes\Api;
use PhpPublishingTest\Core\Concerns\Model;
use PhpPublishingTest\Core\Contracts\BaseModel;
use PhpPublishingTest\Core\Conversion\ListOf;
use PhpPublishingTest\Models\Pet\Status;
use PhpPublishingTest\Models\Pet\Tag;

/**
 * @phpstan-type pet_alias = array{
 *   name: string,
 *   photoURLs: list<string>,
 *   id?: int,
 *   category?: Category,
 *   status?: Status::*,
 *   tags?: list<Tag>,
 * }
 */
final class Pet implements BaseModel
{
    use Model;

    #[Api]
    public string $name;

    /** @var list<string> $photoURLs */
    #[Api('photoUrls', type: new ListOf('string'))]
    public array $photoURLs;

    #[Api(optional: true)]
    public ?int $id;

    #[Api(optional: true)]
    public ?Category $category;

    /**
     * pet status in the store.
     *
     * @var null|Status::* $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /** @var null|list<Tag> $tags */
    #[Api(type: new ListOf(Tag::class), optional: true)]
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
     * @param list<string> $photoURLs
     * @param null|Status::* $status
     * @param null|list<Tag> $tags
     */
    public static function new(
        string $name,
        array $photoURLs,
        ?int $id = null,
        ?Category $category = null,
        ?string $status = null,
        ?array $tags = null,
    ): self {
        $obj = new self;

        $obj->name = $name;
        $obj->photoURLs = $photoURLs;

        null !== $id && $obj->id = $id;
        null !== $category && $obj->category = $category;
        null !== $status && $obj->status = $status;
        null !== $tags && $obj->tags = $tags;

        return $obj;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param list<string> $photoURLs
     */
    public function setPhotoURLs(array $photoURLs): self
    {
        $this->photoURLs = $photoURLs;

        return $this;
    }

    public function setID(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setCategory(Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * pet status in the store.
     *
     * @param Status::* $status
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @param list<Tag> $tags
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }
}
