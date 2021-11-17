<?php

namespace Boloecia\Catalogo\Domain;

interface PuuidInterface
{
    public function value();

    public static function gerarUuid(): PuuidInterface;
}
