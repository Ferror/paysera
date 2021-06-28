<?php
declare(strict_types=1);

namespace Ferror\Infrastructure\Memory;

use Ferror\Domain\Operation;
use Ferror\Domain\Operation\OperationStorage;
use Ferror\Domain\User\UserIdentifier;

/**
 * Extend by making storage able to paginate.
 */
final class MemoryOperationStorage implements OperationStorage
{
    private array $memory = [];

    public function add(Operation $operation): void
    {
        $this->memory[] = $operation;
    }

    public function getAll(): array
    {
        return $this->memory;
    }

    public function findByUserAndWeek(UserIdentifier $identifier, int $week): array
    {
        return \array_filter($this->memory, static function (Operation $item) use ($identifier, $week) {
            return $item->getUser()->equals($identifier) && $item->getWeekNumber() === $week;
        });
    }
}
