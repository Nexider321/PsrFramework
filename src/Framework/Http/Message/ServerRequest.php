<?php
declare(strict_types=1);

namespace Framework\Http\Message;
final class ServerRequest
{

    /**
     * @param array $_SERVER
     */
    public function __construct(
        public readonly array $serverParams,
        public readonly string $uri,
        public readonly string $method,
        public readonly array $queryParams,
        public readonly array $headers,
        public readonly array $cookieParams,
        public readonly string $body,
        public readonly ?array $parsedBody,
    )
    {
    }

    /**
     * @return array
     */
    public function getServerParams(): array
    {
        return $this->serverParams;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @return array
     */
    public function getCookieParams(): array
    {
        return $this->cookieParams;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return array|null
     */
    public function getParsedBody(): ?array
    {
        return $this->parsedBody;
    }
}