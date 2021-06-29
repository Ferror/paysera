<?php
declare(strict_types=1);

namespace Ferror\Unit\Domain\Operation;

use Ferror\Domain\Operation\OperationException;
use Ferror\Domain\Operation\OperationType;
use PHPUnit\Framework\TestCase;

final class OperationTypeTest extends TestCase
{
    public function testItIsInvalidType(): void
    {
        $this->expectException(OperationException::class);
        new OperationType('not-exists');
    }
}
