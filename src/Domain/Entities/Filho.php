<?php

declare(strict_types=1);

namespace App\Domain\Entities;

use App\Domain\Enums\Evento;
use App\Domain\Entities\PessoaEntity;

final class Filho
{

    public function __construct(
        readonly PessoaEntity $pessoa,
    ){

        // verifica se a lista de eventos da pessoa tem um evento com o nome 'Festa de aniversário'
        $eventos = $pessoa->eventos->getListaDeEventos();

        // Verificar se no array eventos existe um evento com um enum Evento::BATIZADO
        $eventoBatizado = array_filter($eventos, function($evento) {
            return $evento['evento'] === Evento::BATIZADO;
        })[0] ?? [];

        
        if(!isset($eventoBatizado['evento'])){
            throw new \Exception('Pessoa não foi batizada');
        }
    }
}