<?php

declare(strict_types=1);

namespace PhpPublishingTest\Resources;

use PhpPublishingTest\Client;
use PhpPublishingTest\Contracts\PetsContract;
use PhpPublishingTest\Core\Conversion;
use PhpPublishingTest\Core\Conversion\ListOf;
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
use PhpPublishingTest\RequestOptions;

final class Pets implements PetsContract
{
    public function __construct(private Client $client) {}

    /**
     * Add a new pet to the store.
     *
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
    ): Pet {
        [$parsed, $options] = PetCreateParam::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'post',
            path: 'pet',
            body: (object) $parsed,
            options: $options
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Pet::class, value: $resp);
    }

    /**
     * Returns a single pet.
     */
    public function retrieve(
        int $petID,
        ?RequestOptions $requestOptions = null
    ): Pet {
        $resp = $this->client->request(
            method: 'get',
            path: ['pet/%1$s', $petID],
            options: $requestOptions
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Pet::class, value: $resp);
    }

    /**
     * Update an existing pet by Id.
     *
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
    ): Pet {
        [$parsed, $options] = PetUpdateParam::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'put',
            path: 'pet',
            body: (object) $parsed,
            options: $options
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(Pet::class, value: $resp);
    }

    /**
     * delete a pet.
     */
    public function delete(
        int $petID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        return $this->client->request(
            method: 'delete',
            path: ['pet/%1$s', $petID],
            options: $requestOptions
        );
    }

    /**
     * Multiple status values can be provided with comma separated strings.
     *
     * @param array{status?: Status2::*}|PetFindByStatusParam $params
     *
     * @return list<Pet>
     */
    public function findByStatus(
        array|PetFindByStatusParam $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = PetFindByStatusParam::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'get',
            path: 'pet/findByStatus',
            query: $parsed,
            options: $options
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(new ListOf(Pet::class), value: $resp);
    }

    /**
     * Multiple tags can be provided with comma separated strings. Use tag1, tag2, tag3 for testing.
     *
     * @param array{tags?: list<string>}|PetFindByTagsParam $params
     *
     * @return list<Pet>
     */
    public function findByTags(
        array|PetFindByTagsParam $params,
        ?RequestOptions $requestOptions = null
    ): array {
        [$parsed, $options] = PetFindByTagsParam::parseRequest(
            $params,
            $requestOptions
        );
        $resp = $this->client->request(
            method: 'get',
            path: 'pet/findByTags',
            query: $parsed,
            options: $options
        );

        // @phpstan-ignore-next-line;
        return Conversion::coerce(new ListOf(Pet::class), value: $resp);
    }

    /**
     * Updates a pet in the store with form data.
     *
     * @param array{name?: string, status?: string}|PetUpdateByIDParam $params
     */
    public function updateByID(
        int $petID,
        array|PetUpdateByIDParam $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = PetUpdateByIDParam::parseRequest(
            $params,
            $requestOptions
        );

        return $this->client->request(
            method: 'post',
            path: ['pet/%1$s', $petID],
            query: $parsed,
            options: $options,
        );
    }
}
