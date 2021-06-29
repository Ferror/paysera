<?php
declare(strict_types=1);

namespace Ferror\Infrastructure\Memory;

use Ferror\Domain\Operation\OperationCounter;
use Ferror\Domain\User\UserIdentifier;

final class MemoryOperationCounter implements OperationCounter
{
    private array $memory;

    public function __construct(array $memory = [])
    {
        $this->memory = $memory;
    }

    public function increment(UserIdentifier $identifier, int $week): void
    {
        if (isset($this->memory[$identifier->toString()][$week])) {
            $this->memory[$identifier->toString()][$week]++;
        } else {
            $this->memory[$identifier->toString()][$week] = 1;
        }
    }

    public function getWithdrawCount(UserIdentifier $identifier, int $week): int
    {
        return $this->memory[$identifier->toString()][$week] ?? 0;
    }
}
