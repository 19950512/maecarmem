<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use DateTimeImmutable;
use App\Domain\Enums\Evento;
use App\Domain\ValueObjects\OwnName;
use App\Domain\ValueObjects\Stringui;

final class EventosEntity
{

    private array $_listaDeEventos = [];

    public function __construct(){
    }

    public function getListaDeEventos(): array
    {
        return $this->_listaDeEventos;
    }

    public function addEvento(Evento $evento, Stringui $descricao, DateTimeImmutable $data): void
    {
        $this->_listaDeEventos[] = [
            'evento' => $evento,
            'descricao' => $descricao,
            'data' => $data,
        ];
    }
}