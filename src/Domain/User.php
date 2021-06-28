<?php
declare(strict_types=1);

namespace Ferror\Domain;

use Ferror\Domain\User\UserIdentifier;
use Ferror\Domain\User\UserType;

final class User
{
    private UserIdentifier $identifier;
    private UserType $type;

    public function __construct(UserIdentifier $identifier, UserType $type)
    {
        $this->identifier = $identifier;
        $this->type = $type;
    }

    public function isPrivate(): bool
    {
        return $this->type->equals(UserType::private());
    }

    public function isBusiness(): bool
    {
        return $this->type->equals(UserType::business());
    }

    public function equals(UserIdentifier $identifier): bool
    {
        return $this->identifier->equals($identifier);
    }

//    public function withdraw()
//    {
//    }
//
//    public function deposit()
//    {
//    }
}
