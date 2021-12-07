<?php

namespace Boloecia\Catalogo\Domain;

use Boloecia\Catalogo\SharedKernel\Produto;
use Boloecia\Catalogo\SharedKernel\Puuid;
use DomainException;
use Exception;

/*
 * charset: utf-8
 * class: substantivo
 * metodo: verbo no infinitivo
 */
class Catalogo
{
    private $data = [];
    private CatalogoRepositorioInterface $repository;

    public function __construct(CatalogoRepositorioInterface $repository)
    {
        $this->repository = $repository;
    }

    public function registrar(Produto $produto)
    {
        try {
            // $this->repository->registrar($produto);
            $this->data[$produto->puuid()->value()] = $produto;
        } catch (Exception $e) {
            throw new DomainException('não foi possível registar produto');
        }
    }

    public function recuperarPorPuuid(Puuid $puuid)
    {
        return $this->data[$puuid->value()];
    }

    public function listar(): CatalogoProduto
    {
        return $this->repository->listar();
    } // @codeCoverageIgnore
}
