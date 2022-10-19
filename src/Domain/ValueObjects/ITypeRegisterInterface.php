<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

interface ITypeRegisterInterface
{
    static function validation(string $document_number): bool;
    function get(): string;
}