<?php

namespace Test\Boloecia\Catalogo;

use PHPUnit\Framework\TestCase;

use Boloecia\Catalogo\Domain\Catalogo;
use Boloecia\Catalogo\Domain\CatalogoGrupoProduto;
use Boloecia\Catalogo\Domain\CatalogoProduto;
use Boloecia\Catalogo\Domain\CatalogoRepositorioInterface;
use Boloecia\Catalogo\Infra\Repository\CatalogoRepositorio;
use Boloecia\Catalogo\SharedKernel\Puuid;

class CatalogoTest extends TestCase
{
    public function testCatalogoListarDeveRetornarUmArray()
    {
        $catalogo = new Catalogo(new CatalogoRepositorio());
        $listaProduto = $catalogo->listar();
        $this->assertIsArray($listaProduto);
    }

    public function testCatalogoListarDeveRetornarUmArrayNaoVazio()
    {
        $stub = $this->createMock(CatalogoRepositorioInterface::class);
        $stub->method('listar')
             ->willreturn(['foo' => 'barr']);

        $catalogo = new Catalogo($stub);
        $listaProduto = $catalogo->listar();

        $this->assertNotEmpty($listaProduto);
    }

    public function testCatalogoListarDeveRetornarUmArrayNaoVazioComObjetosProduto()
    {
        $puuid = Puuid::gerarUuid();
        $grupo = new CatalogoGrupoProduto('grupo#1');
        $nome  = 'bolo de canela';
        $preco = 10.0;
        $descricao = 'muito bom';

        $stub = $this->createMock(CatalogoRepositorioInterface::class);
        $stub->method('listar')
             ->willreturn([new CatalogoProduto($puuid, $grupo, $nome, $preco, $descricao)]);

        foreach((new Catalogo($stub))->listar() as $produto) {
            $this->assertInstanceOf(CatalogoProduto::class, $produto);
        }
    }
}
