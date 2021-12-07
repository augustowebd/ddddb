<?php

namespace Boloecia\Catalogo\SharedKernel;

use Boloecia\Catalogo\Domain\ValueObjectable;
use Boloecia\Catalogo\Domain\CatalogoGrupoProduto;

class Produto implements ValueObjectable
{
    private Puuid $puuid;
    private CatalogoGrupoProduto $grupo;
    private string $nome;
    private float $preco;
    private string $descricao;

    public function __construct(
          Puuid $puuid
        , CatalogoGrupoProduto $grupo
        , string $nome
        , float $preco
        , string $descricao
    ) {
        $this->puuid = $puuid;
        $this->grupo = $grupo;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->descricao = $descricao;
    }

    public function puuid(): Puuid
    {
        return $this->puuid;
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

    public function value()
    {
    }
}
