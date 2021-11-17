<?php

namespace Boloecia\Catalogo\Domain;

use Boloecia\Catalogo\SharedKernel\Puuid;

class CatalogoProduto
{
    /* Produto Universally Unique IDentifier */
    private PuuidInterface $identificadorProduto;
    private CatalogoGrupoProduto $grupo;
    private string $nome;
    private float $preco;
    private string $descricao;

    public function __construct(
          PuuidInterface $identificadorProduto
        , CatalogoGrupoProduto $grupo
        , string $nome
        , float $preco
        , string $descricao
    ) {
        $this->identificadorProduto = $identificadorProduto;
        $this->grupo = $grupo;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
    }

    public function identificadorProduto(): PuuidInterface
    {
        return $this->identificadorProduto;
    }

    public function grupo(): CatalogoGrupoProduto
    {
        return $this->grupo;
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function preco(): float
    {
        return $this->preco;
    }

    public function descricao(): string
    {
        return $this->descricao;
    }
}
