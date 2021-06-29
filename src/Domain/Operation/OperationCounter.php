<?php
declare(strict_types=1);

namespace Ferror\Domain\Operation;

use Ferror\Domain\User\UserIdentifier;

interface OperationCounter
{
    public function increment(UserIdentifier $identifier, int $week): void;
    public function getWithdrawCount(UserIdentifier $identifier, int $week): int;
}
