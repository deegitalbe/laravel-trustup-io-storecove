<?php

namespace Deegitalbe\LaravelTrustupIoStorecove\Exceptions;

use Exception;

/**
 * Exception with additional context.
 */
abstract class ContextualException extends Exception
{
    public array $exceptionContext = [];

    /**
     * @return static
     */
    public function withContext(array $context): self
    {
        $this->exceptionContext = $context;

        return $this;
    }

    /**
     * @return static
     */
    public function addToContext(array $additionalContext): self
    {
        $this->exceptionContext = array_merge($additionalContext, $this->exceptionContext);

        return $this;
    }

    public function context(): array
    {
        return $this->exceptionContext;
    }
}
