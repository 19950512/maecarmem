<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use App\Application\Utils\Utils;
use App\Domain\Errors\ValueObjects\InvalidCNPJ;

final class CNPJ implements ITypeRegisterInterface
{

    function __construct(
        private string $document_number
    ){

        if(!self::validation($this->document_number)){
            throw new InvalidCNPJ('CNPJ is not valid');
        }

        $this->document_number = Utils::mask($this->document_number, '##.###.###/####-##');
    }

    function get(): string {
        return $this->document_number;
    }

    static function validation(string $document_number): bool {

        $cnpj = $document_number;

        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }
    public function __toString(): string
    {
        return  $this->document_number;
    }
}