<?php

namespace Test\Boloecia\Catalogo;

use PHPUnit\Framework\TestCase;

use Boloecia\Catalogo\Domain\Catalogo;
use Boloecia\Catalogo\Domain\CatalogoGrupoProduto;
use Boloecia\Catalogo\Domain\CatalogoProduto;
use Boloecia\Catalogo\Infra\Repository\CatalogoRepositorio;
use Boloecia\Catalogo\SharedKernel\Produto;
use Boloecia\Catalogo\SharedKernel\Puuid;

class CatalogoTest extends TestCase
{
    public function testCatalogoListarDeveRetornarUmCatalogoGrupoProduto()
    {
        $catalogo     = new Catalogo(new CatalogoRepositorio());
        $listaProduto = $catalogo->listar();
        $this->assertInstanceOf(CatalogoProduto::class, $listaProduto);
    }

    public function testCatalogPrecisarTerMetodoParaRegistraNovoProdudo()
    {
        $puuid     = Puuid::gerarUuid();
        $grupo     = new CatalogoGrupoProduto('grupo#1');
        $nome      = 'bolo de canela';
        $preco     = 10.0;
        $descricao = 'muito bom';
        $produto   =  new Produto($puuid, $grupo, $nome, $preco, $descricao);

        $catalogo  = new Catalogo(new CatalogoRepositorio());
        $catalogo->registrar($produto);
        $produtoRegistrado = $catalogo->recuperarPorPuuid($puuid);

        $this->assertTrue(
            $puuid === $produtoRegistrado->puuid()
        );
    }

    public function testCatalogOProdutoRegistradoDeveraSerOmesmoRecuperado()
    {
        $puuid     = Puuid::gerarUuid();
        $grupo     = new CatalogoGrupoProduto('grupo#1');
        $nome      = 'bolo de canela';
        $preco     = 10.0;
        $descricao = 'muito bom';

        $produto   =  new Produto($puuid, $grupo, $nome, $preco, $descricao);

        $catalogoRegistro  = new Catalogo(new CatalogoRepositorio());
        $catalogoRegistro->registrar($produto);

        # persistência requerida
        // TODO: implementar persistência dos dados
        $catalogoRecupera  = new Catalogo(new CatalogoRepositorio());
        $produtoRegistrado = $catalogoRecupera->recuperarPorPuuid($puuid);

        $this->assertTrue(
            $puuid === $produtoRegistrado->puuid()
        );
    }
}
