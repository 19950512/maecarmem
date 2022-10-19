<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use \DateTimeImmutable;
use InvalidArgumentException;

final class Birth
{
    public function __construct(
        public DateTimeImmutable $date,
    ){
        if ($date > new DateTimeImmutable()) {
            throw new \InvalidArgumentException('Birth date cannot be in the future');
        }

        if ($date < new DateTimeImmutable('1900-01-01')) {
            throw new InvalidArgumentException('Birth date cannot be before 1900');
        }

        $this->date = $date;
    }
}