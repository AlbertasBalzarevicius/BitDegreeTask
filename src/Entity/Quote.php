<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\EntityIdTrait;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity]
class Quote
{
    use EntityIdTrait;
    use TimestampableEntity;

    #[ORM\Column(type: 'string')]
    private string $symbol;

    #[ORM\Column(type: 'float')]
    private float $price;

    #[ORM\Column(type: 'integer')]
    private int $volume24h;

    #[ORM\Column(type: 'float')]
    private float $marketCap;

    #[ORM\Column(type: 'integer')]
    private int $marketCapDominance;

    #[ORM\Column(type: 'float')]
    private float $fullyDilutedMarketCap;

    #[ORM\ManyToOne(targetEntity: Cryptocurrency::class, inversedBy: 'quotes')]
    #[ORM\JoinColumn(name: 'cryptocurrency_id', referencedColumnName: 'id')]
    private Cryptocurrency $cryptocurrency;

    public function __construct(
        string $symbol,
        float $price,
        int $volume24h,
        float $marketCap,
        int $marketCapDominance,
        float $fullyDilutedMarketCap
    ) {
        $this->symbol = $symbol;
        $this->price = $price;
        $this->volume24h = $volume24h;
        $this->marketCap = $marketCap;
        $this->marketCapDominance = $marketCapDominance;
        $this->fullyDilutedMarketCap = $fullyDilutedMarketCap;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function setSymbol(string $symbol): Quote
    {
        $this->symbol = $symbol;
        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): Quote
    {
        $this->price = $price;
        return $this;
    }

    public function getVolume24h(): int
    {
        return $this->volume24h;
    }

    public function setVolume24h(int $volume24h): Quote
    {
        $this->volume24h = $volume24h;
        return $this;
    }

    public function getMarketCap(): float
    {
        return $this->marketCap;
    }

    public function setMarketCap(float $marketCap): Quote
    {
        $this->marketCap = $marketCap;
        return $this;
    }

    public function getMarketCapDominance(): int
    {
        return $this->marketCapDominance;
    }

    public function setMarketCapDominance(int $marketCapDominance): Quote
    {
        $this->marketCapDominance = $marketCapDominance;
        return $this;
    }

    public function getFullyDilutedMarketCap(): float
    {
        return $this->fullyDilutedMarketCap;
    }

    public function setFullyDilutedMarketCap(float $fullyDilutedMarketCap): Quote
    {
        $this->fullyDilutedMarketCap = $fullyDilutedMarketCap;
        return $this;
    }

    public function getCryptocurrency(): Cryptocurrency
    {
        return $this->cryptocurrency;
    }

    public function setCryptocurrency(Cryptocurrency $cryptocurrency): Quote
    {
        $this->cryptocurrency = $cryptocurrency;
        return $this;
    }
}