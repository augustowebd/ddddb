<?php

namespace Boloecia\Catalogo\SharedKernel;

use Boloecia\Catalogo\Domain\PuuidInterface;
use Boloecia\Catalogo\Domain\ValueObjectable;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Puuid implements ValueObjectable, PuuidInterface
{
    private UuidInterface $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = Uuid::fromString($uuid);
    }

    public function value()
    {
        return $this->uuid->toString();
    // @codeCoverageIgnoreStart
    }
    // @codeCoverageIgnoreEnd

    public static function gerarUuid(): self
    {
        return new self(Uuid::uuid4()->toString());
    // @codeCoverageIgnoreStart
    }
    // @codeCoverageIgnoreEnd
}
