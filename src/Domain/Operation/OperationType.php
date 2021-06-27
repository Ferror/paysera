<?php
declare(strict_types=1);

namespace Ferror\Domain\Operation;

final class OperationType
{
    public const WITHDRAW = 'WITHDRAW';
    public const DEPOSIT = 'DEPOSIT';

    private string $type;

    public static function withdraw(): self
    {
        return new self(self::WITHDRAW);
    }

    public static function deposit(): self
    {
        return new self(self::DEPOSIT);
    }

    /**
     * @throws \Ferror\Domain\Operation\OperationException
     */
    public function __construct(string $type)
    {
        if (! \in_array(\strtoupper($type), [self::WITHDRAW, self::DEPOSIT])) {
            throw new OperationException('Invalid Operation Type');
        }

        $this->type = $type;
    }
}
