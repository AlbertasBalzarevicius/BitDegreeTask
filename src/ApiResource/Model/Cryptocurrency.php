<?php

declare(strict_types=1);

namespace App\ApiResource\Model;

use ApiPlatform\Doctrine\Odm\Filter\DateFilter;
use ApiPlatform\Doctrine\Odm\Filter\SearchFilter;
use ApiPlatform\Metadata\ApiFilter;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\ApiResource\State\Provider\GetCryptocurrencyCollection;

#[ApiResource(
    operations: [
        new Get(
            uriTemplate: '/cryptocurrency/{id}'
        ),
        new GetCollection(
            uriTemplate: '/cryptocurrencies',
            provider: GetCryptocurrencyCollection::class,
        )
    ]
)]
#[ApiFilter(SearchFilter::class, properties: ['name'])]
class Cryptocurrency
{
    private string $name;

    private float $circulatingSupply;

    public function __construct(
        string $name,
        float $circulatingSupply
    ) {
        $this->name = $name;
        $this->circulatingSupply = $circulatingSupply;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Cryptocurrency
    {
        $this->name = $name;
        return $this;
    }

    public function getCirculatingSupply(): float
    {
        return $this->circulatingSupply;
    }

    public function setCirculatingSupply(float $circulatingSupply): Cryptocurrency
    {
        $this->circulatingSupply = $circulatingSupply;
        return $this;
    }
}