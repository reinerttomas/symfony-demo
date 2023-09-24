<?php

declare(strict_types=1);

namespace App\Exception;

use Exception as BaseException;

abstract class Exception extends BaseException
{
    private ?string $action = null;

    final public function __construct(
        string $message = '',
        int $code = 0,
        \Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    public static function new(): static
    {
        return new static();
    }

    public function withMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function withAction(string $action): self
    {
        $this->action = $action;

        return $this;
    }

    public function __toString(): string
    {
        if ($this->action === null) {
            return parent::__toString();
        }

        return sprintf('Action: %s. Message: %s.', $this->action, $this->message);
    }
}
