<?php
declare(strict_types=1);

namespace Ferror\Unit\Domain\User;

use Ferror\Domain\User\UserException;
use Ferror\Domain\User\UserType;
use PHPUnit\Framework\TestCase;

final class UserTypeTest extends TestCase
{
    public function testItIsInvalidType(): void
    {
        $this->expectException(UserException::class);
        new UserType('not-exists');
    }
}
