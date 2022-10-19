<?php

use App\Domain\Enums\Evento;
use App\Domain\Entities\Filho;
use App\Domain\ValueObjects\Birth;
use App\Domain\ValueObjects\OwnName;
use App\Domain\Entities\PessoaEntity;
use App\Domain\ValueObjects\FullName;
use App\Domain\ValueObjects\Stringui;
use App\Domain\Entities\EventosEntity;
use App\Domain\ValueObjects\Membership;

beforeEach(function () {

    $this->eventos = new EventosEntity();

    $this->eventos->addEvento(
        evento: Evento::BATIZADO,
        descricao: new Stringui('Pessoa batizada'),
        data: new DateTimeImmutable('2021-01-01')
    );

    $this->eventos->addEvento(
        evento: Evento::AMALA,
        descricao: new Stringui('Evento Amala'),
        data: new DateTimeImmutable('2021-01-01')
    );

    $this->pessoa = new PessoaEntity(
        fullName: new FullName('Matheus Maydana'),
        birth: new Birth(new DateTimeImmutable('1995-05-05')),
        membership: new Membership(
            fathersName: new FullName('João Maydana'),
            mothersName: new FullName('Maria Maydana'),
        ),
        eventos: $this->eventos,
    );

    $this->filho = new Filho($this->pessoa);
});

test('Should be a instance of Filho', function () {
    expect($this->filho)->toBeInstanceOf(Filho::class);
});

test('Should be a instance of PessoaEntity', function () {
    expect($this->filho->pessoa)->toBeInstanceOf(PessoaEntity::class);
});

test('Should be a instance of FullName', function () {
    expect($this->filho->pessoa->fullName)->toBeInstanceOf(FullName::class);
});

test('Should be a instance of Birth', function () {
    expect($this->filho->pessoa->birth)->toBeInstanceOf(Birth::class);
});

test('Should be a instance of Membership', function () {
    expect($this->filho->pessoa->membership)->toBeInstanceOf(Membership::class);
});

test('Should be a instance of EventosEntity', function () {
    expect($this->filho->pessoa->eventos)->toBeInstanceOf(EventosEntity::class);
});

test('Should be a instance of OwnName', function () {

    $eventos = $this->filho->pessoa->eventos->getListaDeEventos();
    expect($eventos[0]['evento'])->toBeInstanceOf(Evento::class);
});

test('Should be a instance of Stringui', function () {

    $eventos = $this->filho->pessoa->eventos->getListaDeEventos();
    expect($eventos[0]['descricao'])->toBeInstanceOf(Stringui::class);
});

test('Should be a instance of DateTimeImmutable', function () {
    $eventos = $this->filho->pessoa->eventos->getListaDeEventos();
    expect($eventos[0]['data'])->toBeInstanceOf(DateTimeImmutable::class);
});