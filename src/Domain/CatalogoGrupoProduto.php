<?php

namespace Boloecia\Catalogo\Domain;

class CatalogoGrupoProduto implements ValueObjectable
{
    private string $nome;

    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }

    public function value()
    {
        return $this->nome;
    }
}
