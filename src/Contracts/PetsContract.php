<?php

declare(strict_types=1);

namespace PhpPublishingTest\Contracts;

use PhpPublishingTest\Models\Category;
use PhpPublishingTest\Models\Pet;
use PhpPublishingTest\Parameters\PetCreateParam;
use PhpPublishingTest\Parameters\PetCreateParam\Status;
use PhpPublishingTest\Parameters\PetCreateParam\Tag;
use PhpPublishingTest\Parameters\PetFindByStatusParam;
use PhpPublishingTest\Parameters\PetFindByStatusParam\Status as Status2;
use PhpPublishingTest\Parameters\PetFindByTagsParam;
use PhpPublishingTest\Parameters\PetUpdateByIDParam;
use PhpPublishingTest\Parameters\PetUpdateParam;
use PhpPublishingTest\Parameters\PetUpdateParam\Status as Status1;
use PhpPublishingTest\Parameters\PetUpdateParam\Tag as Tag1;
use PhpPublishingTest\Parameters\PetUploadImageParam;
use PhpPublishingTest\RequestOptions;
use PhpPublishingTest\Responses\PetUploadImageResponse;

interface PetsContract
{
    /**
     * @param array{
     *   name: string,
     *   photoURLs: list<string>,
     *   id?: int,
     *   category?: Category,
     *   status?: Status::*,
     *   tags?: list<Tag>,
     * }|PetCreateParam $params
     */
    public function create(
        array|PetCreateParam $params,
        ?RequestOptions $requestOptions = null
    ): Pet;

    public function retrieve(
        int $petID,
        ?RequestOptions $requestOptions = null
    ): Pet;

    /**
     * @param array{
     *   name: string,
     *   photoURLs: list<string>,
     *   id?: int,
     *   category?: Category,
     *   status?: Status1::*,
     *   tags?: list<Tag1>,
     * }|PetUpdateParam $params
     */
    public function update(
        array|PetUpdateParam $params,
        ?RequestOptions $requestOptions = null
    ): Pet;

    public function delete(
        int $petID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @param array{status?: Status2::*}|PetFindByStatusParam $params
     *
     * @return list<Pet>
     */
    public function findByStatus(
        array|PetFindByStatusParam $params,
        ?RequestOptions $requestOptions = null,
    ): array;

    /**
     * @param array{tags?: list<string>}|PetFindByTagsParam $params
     *
     * @return list<Pet>
     */
    public function findByTags(
        array|PetFindByTagsParam $params,
        ?RequestOptions $requestOptions = null
    ): array;

    /**
     * @param array{name?: string, status?: string}|PetUpdateByIDParam $params
     */
    public function updateByID(
        int $petID,
        array|PetUpdateByIDParam $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;

    /**
     * @param array{additionalMetadata?: string}|PetUploadImageParam $params
     */
    public function uploadImage(
        int $petID,
        string $image,
        array|PetUploadImageParam $params,
        ?RequestOptions $requestOptions = null,
    ): PetUploadImageResponse;
}
