<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use App\Domain\ValueObjects\FullName;

final class Membership
{
    public function __construct(
        FullName $fathersName,
        FullName $mothersName,
    )
    {}
}