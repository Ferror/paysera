<?php
declare(strict_types=1);

namespace Ferror\Infrastructure\Memory;

use Ferror\Domain\Operation;
use Ferror\Domain\OperationStorage;

final class MemoryOperationStorage implements OperationStorage
{
    private array $memory = [];

    public function add(Operation $operation): void
    {
        $this->memory[] = $operation;
    }
}
