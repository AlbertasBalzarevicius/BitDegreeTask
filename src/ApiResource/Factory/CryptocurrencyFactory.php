<?php

declare(strict_types=1);

namespace App\ApiResource\Factory;

use App\ApiResource\Model\Cryptocurrency as CryptocurrencyModel;
use App\Entity\Cryptocurrency;

class CryptocurrencyFactory
{
    public function createFromEntity(Cryptocurrency $cryptocurrency): CryptocurrencyModel
    {
        return new CryptocurrencyModel(
            $cryptocurrency->getName(),
            $cryptocurrency->getCirculatingSupply(),
        );
    }

    /**
     * @param Cryptocurrency[] $cryptocurrencies
     * @return CryptocurrencyModel[]
     */
    public function createManyFromEntity(array $cryptocurrencies): array
    {
        return \array_map(
            fn(Cryptocurrency $cryptocurrency): CryptocurrencyModel => $this->createFromEntity($cryptocurrency),
            $cryptocurrencies,
        );
    }
}