<?php
declare(strict_types=1);

namespace Ferror\Domain\User;

final class UserType
{
    public const PRIVATE = 'PRIVATE';
    public const BUSINESS = 'BUSINESS';

    private string $type;

    public static function business(): self
    {
        return new self(self::BUSINESS);
    }

    public static function private(): self
    {
        return new self(self::PRIVATE);
    }

    /**
     * @throws \Ferror\Domain\User\UserException
     */
    public function __construct(string $type)
    {
        if (! \in_array(\strtoupper($type), [self::PRIVATE, self::BUSINESS])) {
            throw new UserException('Invalid User Type');
        }

        $this->type = $type;
    }
}
