<?php

declare(strict_types=1);

namespace App\Client\CoinMarketCap\DTO;

class QuoteDTO
{
    private string $symbol;

    private float $price;

    private int $volume24h;

    private float $marketCap;

    private int $marketCapDominance;

    private float $fullyDilutedMarketCap;

    public function __construct(
        string $symbol,
        float $price,
        int $volume24h,
        float $marketCap,
        int $marketCapDominance,
        float $fullyDilutedMarketCap)
    {
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

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getVolume24h(): int
    {
        return $this->volume24h;
    }

    public function getMarketCap(): float
    {
        return $this->marketCap;
    }

    public function getMarketCapDominance(): int
    {
        return $this->marketCapDominance;
    }

    public function getFullyDilutedMarketCap(): float
    {
        return $this->fullyDilutedMarketCap;
    }
}