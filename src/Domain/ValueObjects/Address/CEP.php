<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Address;

use DomainException;
use App\Application\Utils\Utils;

final class CEP
{
    public function __construct(
        private string $cep
    )
    {
        if(!self::validation($this->cep)){
            throw new DomainException('CEP is not valid');
        }

        $this->cep = Utils::mask($this->cep, '#####-###');
    }

    public function get(): string{
        return $this->cep;
    }

    public static function validation(string $cep): bool
    {
        return !!preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $cep);
    }

    public function __toString(): string
    {
        return  "CEP: ${$this->cep}";
    }
}