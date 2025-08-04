<?php

declare(strict_types=1);

namespace PhpPublishingTest;

class RequestOptions
{
    public const DEFAULT_TIMEOUT = 60;

    public const DEFAULT_MAX_RETRIES = 2;

    public const DEFAULT_INITIAL_RETRYDELAY = 0.5;

    public const DEFAULT_MAX_RETRY_DELAY = 8.0;

    /**
     * @param list<string> $extraHeaders
     * @param list<string> $extraQueryParams
     * @param list<string> $extraBodyParams
     */
    public function __construct(
        public float $timeout = self::DEFAULT_TIMEOUT,
        public int $maxRetries = self::DEFAULT_MAX_RETRIES,
        public float $initialRetryDelay = self::DEFAULT_INITIAL_RETRYDELAY,
        public float $maxRetryDelay = self::DEFAULT_MAX_RETRY_DELAY,
        public array $extraHeaders = [],
        public array $extraQueryParams = [],
        public array $extraBodyParams = [],
    ) {}

    /**
     * @return array{
     *   timeout: float,
     *   maxRetries: int,
     *   initialRetryDelay: float,
     *   maxRetryDelay: float,
     *   extraHeaders: list<string>,
     *   extraQueryParams: list<string>,
     *   extraBodyParams: list<string>,
     * }
     */
    public function __serialize(): array
    {
        return [
            'timeout' => $this->timeout,
            'maxRetries' => $this->maxRetries,
            'initialRetryDelay' => $this->initialRetryDelay,
            'maxRetryDelay' => $this->maxRetryDelay,
            'extraHeaders' => $this->extraHeaders,
            'extraQueryParams' => $this->extraQueryParams,
            'extraBodyParams' => $this->extraBodyParams,
        ];
    }

    /**
     * @param array{
     *   timeout?: null|float,
     *   maxRetries?: null|int,
     *   initialRetryDelay?: null|float,
     *   maxRetryDelay?: null|float,
     *   extraHeaders?: null|list<string>,
     *   extraQueryParams?: null|list<string>,
     *   extraBodyParams?: null|list<string>,
     * } $data
     */
    public function __unserialize(array $data): void
    {
        $this->timeout = $data['timeout'] ?? self::DEFAULT_TIMEOUT;
        $this
            ->maxRetries = $data['maxRetries'] ?? self::DEFAULT_MAX_RETRIES
        ;
        $this
            ->initialRetryDelay = $data[
          'initialRetryDelay'
        ] ?? self::DEFAULT_INITIAL_RETRYDELAY
        ;
        $this->maxRetryDelay = $data[
          'maxRetryDelay'
        ] ?? self::DEFAULT_MAX_RETRY_DELAY;
        $this->extraHeaders = $data[
          'extraHeaders'
        ] ?? [];
        $this->extraQueryParams = $data['extraQueryParams'] ?? [];
        $this
            ->extraBodyParams = $data['extraBodyParams'] ?? []
        ;
    }

    /**
     * @param null|array{
     *   timeout?: null|float,
     *   maxRetries?: null|int,
     *   initialRetryDelay?: null|float,
     *   maxRetryDelay?: null|float,
     *   extraHeaders?: null|list<string>,
     *   extraQueryParams?: null|list<string>,
     *   extraBodyParams?: null|list<string>,
     * }|RequestOptions $options
     */
    public static function parse(null|array|RequestOptions $options): self
    {
        if (is_null($options)) {
            return new self;
        }

        if ($options instanceof self) {
            return $options;
        }

        $opts = new self;
        $opts->__unserialize($options);

        return $opts;
    }
}
