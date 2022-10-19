<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Address;

use DomainException;

final class State
{
    public function __construct(
        private string $state
    )
    {
        /* if(!self::validation($this->state)){
            throw new DomainException('State is not valid');
        } */

        if(empty($this->state)){
            throw new DomainException('State not informed');
        }

        if(strlen($this->state) == 2){

            if(!self::validationUF($this->state)){
                throw new DomainException('State not valid');
            }

            if(isset(self::$states[strtoupper($this->state)])){
                $this->state = self::$states[$this->state];
                return;
            }
            
            throw new DomainException('State not exists');
        }


        if(strlen($this->state) > 2){

            $state = array_search($this->state, self::$states);

            if($state){
                $this->state = self::$states[$state];
                return;
            }

            throw new DomainException('State not exists');
        }

        throw new DomainException('State invalid');
    }

    private static $states = [
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'DF' => 'Distrito Federal',
        'ES' => 'Espírito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MT' => 'Mato Grosso',
        'MS' => 'Mato Grosso do Sul',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TO' => 'Tocantins',
    ];

    public function getUF(): string
    {
        return array_search($this->state, self::$states);
    }

    public function getFull(): string{
        return $this->state;
    }

    public static function validationUF(string $uf): bool
    {
        return !!preg_match('/^[A-Z]{2,2}$/', $uf);
    }

    public function __toString(): string
    {
        return  "UF: ${$this->uf}";
    }
}