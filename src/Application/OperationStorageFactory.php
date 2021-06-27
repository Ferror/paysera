<?php
declare(strict_types=1);

namespace Ferror\Application;

use Ferror\Domain\Currency;
use Ferror\Domain\Money;
use Ferror\Domain\Operation;
use Ferror\Domain\OperationStorage;
use Ferror\Domain\Price;
use Ferror\Domain\User\UserIdentifier;
use Ferror\Domain\User\UserType;
use Ferror\Infrastructure\Memory\MemoryOperationStorage;

final class OperationStorageFactory
{
    public function fromFile(string $filename): OperationStorage
    {
        $file = \fopen($filename, 'rb');
        $storage = new MemoryOperationStorage();

        if (false === $file) {
            throw new \RuntimeException('Invalid File');
        }

        while (! \feof($file)) {
            $line = \fgets($file);

            if (false !== $line) {
                $data = \explode(',', $line);
                $createdAt = \DateTime::createFromFormat('Y-m-d', $data[0]);

                if (false === $createdAt) {
                    throw new \RuntimeException('Invalid DateTime');
                }

                $storage->add(new Operation(
                    new UserIdentifier($data[1]),
                    new UserType($data[2]),
                    $createdAt,
                    new Operation\OperationType($data[3]),
                    new Money(Price::fromString($data[4]), new Currency($data[5]))
                ));
            }
        }

        return $storage;
    }
}
