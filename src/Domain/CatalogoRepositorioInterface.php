<?php

namespace Boloecia\Catalogo\Domain;

use Boloecia\Catalogo\SharedKernel\Produto;
use Boloecia\Catalogo\SharedKernel\Puuid;

interface CatalogoRepositorioInterface
{
    public function listar(): CatalogoProduto;

    public function registrar(Produto $produto);

    // public function recuperarPorPuuid(Puuid $puuid): Produto;
}
