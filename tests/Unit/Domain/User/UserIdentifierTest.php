<?php
declare(strict_types=1);

namespace Ferror\Unit\Domain\User;

use Ferror\Domain\User\UserIdentifier;
use PHPUnit\Framework\TestCase;

final class UserIdentifierTest extends TestCase
{
    public function testItEquals(): void
    {
        self::assertTrue((new UserIdentifier(''))->equals(new UserIdentifier('')));
        self::assertTrue((new UserIdentifier('id'))->equals(new UserIdentifier('id')));
        self::assertTrue((new UserIdentifier('-'))->equals(new UserIdentifier('-')));
        self::assertTrue((new UserIdentifier(' '))->equals(new UserIdentifier(' ')));
        self::assertFalse((new UserIdentifier('not'))->equals(new UserIdentifier('true')));
    }

    public function testToString(): void
    {
        self::assertEquals('', (new UserIdentifier(''))->toString());
        self::assertEquals('-', (new UserIdentifier('-'))->toString());
        self::assertEquals('id', (new UserIdentifier('id'))->toString());
        self::assertEquals('', (string) new UserIdentifier(''));
        self::assertEquals('-', (string) new UserIdentifier('-'));
        self::assertEquals('id', (string) new UserIdentifier('id'));
    }
}
