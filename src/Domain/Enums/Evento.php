<?php

declare (strict_types = 1);

namespace App\Domain\Enums;

enum Evento
{
    case OBI;
    case BATIZADO;
    case CASAMENTO;
    case AMALA;
    case AMACI;
    case DESCARREGO;
    case NACAO;
    case CORTE;
    case COROA;
    case TROCA_MAO;
}