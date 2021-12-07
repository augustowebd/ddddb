<?php

namespace Boloecia\Catalogo\Infra\Repository;

use Boloecia\Catalogo\Domain\CatalogoProduto;
use Boloecia\Catalogo\Domain\CatalogoRepositorioInterface;
use Boloecia\Catalogo\SharedKernel\Produto;

class CatalogoRepositorio implements CatalogoRepositorioInterface
{
    public function listar(): CatalogoProduto
    {
        $produtos = [];
        $catalogo = new CatalogoProduto();

        foreach ($produtos as $produto) {
        }

        return $catalogo;
    }

    public function registrar(Produto $produto)
    {

    }
}
