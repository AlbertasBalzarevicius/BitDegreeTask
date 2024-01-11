<?php

declare(strict_types=1);

namespace App\Client\CoinMarketCap\DTO;


class CryptocurrencyDTO
{
    private string $name;

    private string $symbol;

    private string $slug;

    private int $cmcRank;

    private int $numMarketPairs;

    private int $circulatingSupply;

    private int $totalSupply;

    private int $maxSupply;

    private bool $infiniteSupply;

    private \DateTime $lastUpdate;

    private \DateTime $dateAdded;

    private ?string $platform;

    private ?int $selfReportedCirculatingSupply;

    private ?int $selfReportedMarketCap;

    /** @var string[] */
    private array $tags;

    /** @var QuoteDTO[] */
    private array $quotes;

    private int $externalId;

    /**
     * @param string[] $tags
     * @param QuoteDTO[] $quotes
     */
    public function __construct(
        string $name,
        string $symbol,
        string $slug,
        int $cmcRank,
        int $numMarketPairs,
        int $circulatingSupply,
        int $totalSupply,
        int $maxSupply,
        bool $infiniteSupply,
        \DateTime $lastUpdate,
        \DateTime $dateAdded,
        ?string $platform,
        ?int $selfReportedCirculatingSupply,
        ?int $selfReportedMarketCap,
        array $tags,
        array $quotes,
        int $externalId,
    ) {
        $this->name = $name;
        $this->symbol = $symbol;
        $this->slug = $slug;
        $this->cmcRank = $cmcRank;
        $this->numMarketPairs = $numMarketPairs;
        $this->circulatingSupply = $circulatingSupply;
        $this->totalSupply = $totalSupply;
        $this->maxSupply = $maxSupply;
        $this->infiniteSupply = $infiniteSupply;
        $this->lastUpdate = $lastUpdate;
        $this->dateAdded = $dateAdded;
        $this->platform = $platform;
        $this->selfReportedCirculatingSupply = $selfReportedCirculatingSupply;
        $this->selfReportedMarketCap = $selfReportedMarketCap;
        $this->tags = $tags;
        $this->quotes = $quotes;
        $this->externalId = $externalId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getCmcRank(): int
    {
        return $this->cmcRank;
    }

    public function getNumMarketPairs(): int
    {
        return $this->numMarketPairs;
    }

    public function getCirculatingSupply(): int
    {
        return $this->circulatingSupply;
    }

    public function getTotalSupply(): int
    {
        return $this->totalSupply;
    }

    public function getMaxSupply(): int
    {
        return $this->maxSupply;
    }

    public function isInfiniteSupply(): bool
    {
        return $this->infiniteSupply;
    }

    public function getLastUpdate(): \DateTime
    {
        return $this->lastUpdate;
    }

    public function getDateAdded(): \DateTime
    {
        return $this->dateAdded;
    }

    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    public function getSelfReportedCirculatingSupply(): ?int
    {
        return $this->selfReportedCirculatingSupply;
    }

    public function getSelfReportedMarketCap(): ?int
    {
        return $this->selfReportedMarketCap;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getQuotes(): array
    {
        return $this->quotes;
    }

    public function getExternalId(): int
    {
        return $this->externalId;
    }
}