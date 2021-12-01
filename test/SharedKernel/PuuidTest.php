<?php

namespace Test\SharedKernel;

use PHPUnit\Framework\TestCase;

use Boloecia\Catalogo\SharedKernel\Puuid;
use Ramsey\Uuid\Exception\InvalidUuidStringException;

class PuuidTest extends TestCase
{
    const UUID4_VALIDO = 'c69d7f7d-13f4-4db4-8666-0206c03bbc5b';
    const UUID4_INVALIDO = 'invalid-uuid';

    public function testDeveReceberUmaStringValidaQueRepresenteUuid()
    {
        $this->assertInstanceOf(Puuid::class, new Puuid(self::UUID4_VALIDO));
    }

    public function testPuuidNaoDeveCriarObjetoComStringDeUuidInvalido()
    {
        $this->expectException(InvalidUuidStringException::class);
        new Puuid(self::UUID4_INVALIDO);
    }

    public function testDeveRetornarOMesmoPuuidInformadoNoConstrutor()
    {
        $this->assertEquals(self::UUID4_VALIDO, (new Puuid(self::UUID4_VALIDO))->value());
    }

    public function testGeradorPuuidDeveraRetornarObjetoPuuidClass()
    {
        $this->assertInstanceOf(Puuid::class, Puuid::gerarUuid());
    }
}
