<?php
declare(strict_types=1);

namespace Ferror\Domain;

use Ferror\Domain\User\UserIdentifier;
use Ferror\Domain\User\UserType;

final class User
{
    private UserIdentifier $identifier;
    private UserType $type;
    private BankAccount $bankAccount;

    public function __construct(UserIdentifier $identifier, UserType $type, BankAccount $bankAccount)
    {
        $this->identifier = $identifier;
        $this->type = $type;
        $this->bankAccount = $bankAccount;
    }

//    public function withdraw()
//    {
//    }
//
//    public function deposit()
//    {
//    }
}
