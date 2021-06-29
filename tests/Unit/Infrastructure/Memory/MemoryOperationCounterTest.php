<?php
declare(strict_types=1);

namespace Ferror\Unit\Infrastructure\Memory;

use Ferror\Domain\User\UserIdentifier;
use Ferror\Infrastructure\Memory\MemoryOperationCounter;
use PHPUnit\Framework\TestCase;

final class MemoryOperationCounterTest extends TestCase
{
    private MemoryOperationCounter $counter;

    protected function setUp(): void
    {
        $this->counter = new MemoryOperationCounter();
    }

    public function testItIncrements(): void
    {
        $this->counter->increment(new UserIdentifier('id'), 1);
        $this->counter->increment(new UserIdentifier('id'), 1);

        self::assertEquals(2, $this->counter->getWithdrawCount(new UserIdentifier('id'), 1));
    }
}
