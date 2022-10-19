<?php

declare(strict_types=1);

namespace App\Domain\Enums;

enum Orixa
{
    case EXU;
    case AXABO;
    case OXUMARE;
    case ERINLE;
    case IBEJI;
    case IEUBA;
    case LOGUNEDE;
    case IAMI_OXORONGA;
    case OCANHIM;
    case OGUM;
    case BABA_ABAOLA;
    case IFA;
    case IANSA;
    case OXALUFA;
    case OXUM;
    case NANA;
    case OBA;
    case OBALUAIE;
    case OXOSSI;
    case OCO;
    case ONILE;
    case XANGO;
    case OXAGUIA;
    case IROCO;
    case BAIANI;

    /* public function color(): string
    {
        return match($this) 
        {
            Status::DRAFT => 'grey',   
            Status::PUBLISHED => 'green',   
            Status::ARCHIVED => 'red',   
        };
    } */
}