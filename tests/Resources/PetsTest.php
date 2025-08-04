<?php

namespace Tests\Resources;

use PhpPublishingTest\Client;
use PhpPublishingTest\Models\Category;
use PhpPublishingTest\Parameters\PetCreateParam;
use PhpPublishingTest\Parameters\PetCreateParam\Tag;
use PhpPublishingTest\Parameters\PetFindByStatusParam;
use PhpPublishingTest\Parameters\PetFindByTagsParam;
use PhpPublishingTest\Parameters\PetUpdateByIDParam;
use PhpPublishingTest\Parameters\PetUpdateParam;
use PhpPublishingTest\Parameters\PetUpdateParam\Tag as Tag1;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PetsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this
            ->client
            ->pets
            ->create(PetCreateParam::new(name: 'doggie', photoURLs: ['string']))
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this
            ->client
            ->pets
            ->create(
                PetCreateParam::new(
                    name: 'doggie',
                    photoURLs: ['string'],
                    id: 10,
                    category: (new Category)->setID(1)->setName('Dogs'),
                    status: 'available',
                    tags: [(new Tag)->setID(0)->setName('name')],
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this->client->pets->retrieve(0);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this
            ->client
            ->pets
            ->update(PetUpdateParam::new(name: 'doggie', photoURLs: ['string']))
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this
            ->client
            ->pets
            ->update(
                PetUpdateParam::new(
                    name: 'doggie',
                    photoURLs: ['string'],
                    id: 10,
                    category: (new Category)->setID(1)->setName('Dogs'),
                    status: 'available',
                    tags: [(new Tag1)->setID(0)->setName('name')],
                )
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this->client->pets->delete(0);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testFindByStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this->client->pets->findByStatus(new PetFindByStatusParam);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testFindByTags(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this->client->pets->findByTags(new PetFindByTagsParam);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUpdateByID(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this->client->pets->updateByID(0, new PetUpdateByIDParam);

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUploadImage(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this->client->pets->uploadImage(0, 'file', 'file');

        $this->assertTrue(true); // @phpstan-ignore-line
    }

    #[Test]
    public function testUploadImageWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('skipped: tests are disabled for the time being');
        }

        $result = $this->client->pets->uploadImage(0, 'file', 'file');

        $this->assertTrue(true); // @phpstan-ignore-line
    }
}
