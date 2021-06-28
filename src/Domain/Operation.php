<?php
declare(strict_types=1);

namespace Ferror\Domain;

use Ferror\Domain\Operation\OperationException;
use Ferror\Domain\Operation\OperationType;

final class Operation
{
    private User $user;
    private \DateTime $createdAt;
    private OperationType $type;
    private Money $money;

    public function __construct(
        User $user,
        \DateTime $createdAt,
        OperationType $type,
        Money $money
    ) {
        $this->user = $user;
        $this->createdAt = $createdAt;
        $this->type = $type;
        $this->money = $money;
    }

    public function getWeekNumber(): int
    {
        return (int) $this->createdAt->format('W');
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getCommission(): Commission
    {
        if ($this->type->equals(OperationType::deposit())) {
            return new Commission(
                $this->money->calculate(
                    new Percentage(0.003)
                )
            );
        }

        if ($this->type->equals(OperationType::withdraw())) {
            if ($this->user->isBusiness()) {
                return new Commission(
                    $this->money->calculate(
                        new Percentage(0.005)
                    )
                );
            }

            if ($this->user->isPrivate()) {
                //@TODO calculate
                return new Commission(
                    $this->money->calculate(
                        new Percentage(0.0)
                    )
                );
            }
        }

        throw new OperationException('Invalid Operation Type');
    }
}
