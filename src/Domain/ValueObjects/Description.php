<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

final class Description {
    
    function __construct(
        private readonly string $value = ''
    ){}

    function get(): string {
        return $this->value;
    }
}