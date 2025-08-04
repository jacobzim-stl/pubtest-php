<?php

declare(strict_types=1);

namespace PhpPublishingTest;

use PhpPublishingTest\Core\BaseClient;
use PhpPublishingTest\Resources\Pets;
use PhpPublishingTest\Resources\Store;
use PhpPublishingTest\Resources\Users;

class Client extends BaseClient
{
    public string $apiKey;

    public Pets $pets;

    public Store $store;

    public Users $users;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('PETSTORE_API_KEY'));

        $base = $baseUrl ?? getenv(
            'PHP_PUBLISHING_TEST_BASE_URL'
        ) ?: 'https://petstore3.swagger.io/api/v3';

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $base,
            options: new RequestOptions,
        );

        $this->pets = new Pets($this);
        $this->store = new Store($this);
        $this->users = new Users($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        return ['api_key' => $this->apiKey];
    }
}
