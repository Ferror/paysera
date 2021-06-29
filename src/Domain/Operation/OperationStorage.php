<?php
declare(strict_types=1);

namespace Ferror\Domain\Operation;

use Ferror\Domain\Operation;
use Ferror\Domain\User\UserIdentifier;

interface OperationStorage
{
    public function add(Operation $operation): void;

    /**
     * @return array|Operation[]
     */
    public function getAll(): array;
}
