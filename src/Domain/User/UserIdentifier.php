<?php
declare(strict_types=1);

namespace Ferror\Domain\User;

final class UserIdentifier
{
    private string $identifier;

    public function __construct(string $identifier)
    {
        $this->identifier = $identifier;
    }

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return $this->identifier;
    }

    public function equals(self $identifier): bool
    {
        return $this->identifier === $identifier->identifier;
    }
}
