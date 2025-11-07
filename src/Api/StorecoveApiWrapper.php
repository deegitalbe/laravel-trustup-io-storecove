<?php

namespace Deegitalbe\LaravelTrustupIoStorecove\Api;

use Deegitalbe\LaravelTrustupIoStorecove\ApiException;
use Deegitalbe\LaravelTrustupIoStorecove\Exceptions\StorecoveApiWrapperException;
use stdClass;
use Stringable;

class StorecoveApiWrapper
{
    private array $request;

    private ApiException $exception;

    private string $message = 'Unable to send request to storecove API';

    private array $context = [];

    /**
     * @template TReturn
     *
     * @param  callable(): TReturn  $callback
     * @return TReturn
     */
    public function send($callback) {
        try {
            $callback();
        } catch (ApiException $exception) {
            $this->setException($exception)
                ->throw();
        }
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param Stringable|Stringable[] $request
     */
    public function setRequest($request): self
    {
        $this->request = collect()->wrap($request)
            ->map(fn ($wrappedRequest) => json_decode((string) $wrappedRequest, true))
            ->all();

        return $this;
    }

    public function setContext(array $context): self
    {
        $this->context = $context;

        return $this;
    }

    private function setException(ApiException $exception): self
    {
        $this->exception = $exception;

        return $this;
    }

    private function getResponse(): array|string|null
    {
        $response = $this->exception->getResponseBody();

        if ($response instanceof stdClass) {
            $response = json_encode($response);
        }

        if (is_string($response)) {
            $response = rescue(fn () => json_decode($response, true), $response, false);
        }

        return $response;
    }

    /**
     * @throws StorecoveApiWrapperException
     */
    private function throw()
    {
        $exception = new StorecoveApiWrapperException(
            $this->message,
            500,
            $this->exception
        );

        throw $exception->withContext([
            'request' => $this->request,
            'exception' => [
                'code' => $this->exception->getCode(),
                'message' => $this->exception->getMessage(),
            ],
            'response' => $this->getResponse()
        ])->addToContext($this->context);

        throw $exception;
    }
}
