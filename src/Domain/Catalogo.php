<?php

namespace Boloecia\Catalogo\Domain;

/*
 * charset: utf-8
 * class: substantivo
 * metodo: verbo no infinitivo
 */
class Catalogo
{
    private CatalogoRepositorioInterface $repository;

    public function __construct(CatalogoRepositorioInterface $repository)
    {
        $this->repository = $repository;
    }

    public function listar(): array
    {
        return $this->repository->listar();
    }
}
