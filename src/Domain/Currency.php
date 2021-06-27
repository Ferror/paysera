<?php
declare(strict_types=1);

namespace Ferror\Domain;

final class Currency
{
    private string $iso3Code;

    public function __construct(string $iso3Code)
    {
        $this->iso3Code = $iso3Code;
    }
}
