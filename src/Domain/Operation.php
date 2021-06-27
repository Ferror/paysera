<?php
declare(strict_types=1);

namespace Ferror\Domain;

use Ferror\Domain\Operation\OperationType;
use Ferror\Domain\User\UserIdentifier;
use Ferror\Domain\User\UserType;

final class Operation
{
    private UserIdentifier $userIdentifier;
    private UserType $userType;
    private \DateTime $createdAt;
    private OperationType $type;
    private Money $money;

    public function __construct(
        UserIdentifier $userIdentifier,
        UserType $userType,
        \DateTime $createdAt,
        OperationType $type,
        Money $money
    ) {
        $this->userIdentifier = $userIdentifier;
        $this->userType = $userType;
        $this->createdAt = $createdAt;
        $this->type = $type;
        $this->money = $money;
    }
}
