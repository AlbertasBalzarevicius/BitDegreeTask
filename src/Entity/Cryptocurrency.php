<?php

declare(strict_types=1);

namespace App\Entity;

use App\Repository\CryptocurrencyRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\EntityIdTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: CryptocurrencyRepository::class)]
class Cryptocurrency
{
    use EntityIdTrait;
    use TimestampableEntity;

    #[ORM\Column(type: 'string')]
    private string $name;

    #[ORM\Column(type: 'string')]
    private string $symbol;

    #[ORM\Column(type: 'string')]
    private string $slug;

    #[ORM\Column(type: 'integer')]
    private int $cmcRank;

    #[ORM\Column(type: 'integer')]
    private int $numMarketPairs;

    #[ORM\Column(type: 'integer')]
    private int $circulatingSupply;

    #[ORM\Column(type: 'integer')]
    private int $totalSupply;

    #[ORM\Column(type: 'integer')]
    private int $maxSupply;

    #[ORM\Column(type: 'string')]
    private bool $infiniteSupply;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $lastUpdate;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $dateAdded;

    #[ORM\Column(type: 'string', nullable: true)]
    private ?string $platform;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $selfReportedCirculatingSupply;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $selfReportedMarketCap;

    #[ORM\OneToMany(targetEntity: Tag::class, mappedBy: 'cryptocurrency')]
    private Collection $tags;

    #[ORM\OneToMany(targetEntity: Quote::class, mappedBy: 'cryptocurrency')]
    private Collection $quotes;

    #[ORM\Column(type: 'integer')]
    private int $externalId;

    public function __construct(
        int $externalId,
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
    ) {
        $this->externalId = $externalId;
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
        $this->tags = new ArrayCollection();
        $this->quotes = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Cryptocurrency
     */
    public function setName(string $name): Cryptocurrency
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getSymbol(): string
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     * @return Cryptocurrency
     */
    public function setSymbol(string $symbol): Cryptocurrency
    {
        $this->symbol = $symbol;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Cryptocurrency
     */
    public function setSlug(string $slug): Cryptocurrency
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return int
     */
    public function getCmcRank(): int
    {
        return $this->cmcRank;
    }

    /**
     * @param int $cmcRank
     * @return Cryptocurrency
     */
    public function setCmcRank(int $cmcRank): Cryptocurrency
    {
        $this->cmcRank = $cmcRank;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumMarketPairs(): int
    {
        return $this->numMarketPairs;
    }

    /**
     * @param int $numMarketPairs
     * @return Cryptocurrency
     */
    public function setNumMarketPairs(int $numMarketPairs): Cryptocurrency
    {
        $this->numMarketPairs = $numMarketPairs;
        return $this;
    }

    /**
     * @return int
     */
    public function getCirculatingSupply(): int
    {
        return $this->circulatingSupply;
    }

    /**
     * @param int $circulatingSupply
     * @return Cryptocurrency
     */
    public function setCirculatingSupply(int $circulatingSupply): Cryptocurrency
    {
        $this->circulatingSupply = $circulatingSupply;
        return $this;
    }

    /**
     * @return int
     */
    public function getTotalSupply(): int
    {
        return $this->totalSupply;
    }

    /**
     * @param int $totalSupply
     * @return Cryptocurrency
     */
    public function setTotalSupply(int $totalSupply): Cryptocurrency
    {
        $this->totalSupply = $totalSupply;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxSupply(): int
    {
        return $this->maxSupply;
    }

    /**
     * @param int $maxSupply
     * @return Cryptocurrency
     */
    public function setMaxSupply(int $maxSupply): Cryptocurrency
    {
        $this->maxSupply = $maxSupply;
        return $this;
    }

    /**
     * @return bool
     */
    public function isInfiniteSupply(): bool
    {
        return $this->infiniteSupply;
    }

    /**
     * @param bool $infiniteSupply
     * @return Cryptocurrency
     */
    public function setInfiniteSupply(bool $infiniteSupply): Cryptocurrency
    {
        $this->infiniteSupply = $infiniteSupply;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdate(): \DateTime
    {
        return $this->lastUpdate;
    }

    /**
     * @param \DateTime $lastUpdate
     * @return Cryptocurrency
     */
    public function setLastUpdate(\DateTime $lastUpdate): Cryptocurrency
    {
        $this->lastUpdate = $lastUpdate;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateAdded(): \DateTime
    {
        return $this->dateAdded;
    }

    /**
     * @param \DateTime $dateAdded
     * @return Cryptocurrency
     */
    public function setDateAdded(\DateTime $dateAdded): Cryptocurrency
    {
        $this->dateAdded = $dateAdded;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPlatform(): ?string
    {
        return $this->platform;
    }

    /**
     * @param string|null $platform
     * @return Cryptocurrency
     */
    public function setPlatform(?string $platform): Cryptocurrency
    {
        $this->platform = $platform;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSelfReportedCirculatingSupply(): ?int
    {
        return $this->selfReportedCirculatingSupply;
    }

    /**
     * @param int|null $selfReportedCirculatingSupply
     * @return Cryptocurrency
     */
    public function setSelfReportedCirculatingSupply(?int $selfReportedCirculatingSupply): Cryptocurrency
    {
        $this->selfReportedCirculatingSupply = $selfReportedCirculatingSupply;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getSelfReportedMarketCap(): ?int
    {
        return $this->selfReportedMarketCap;
    }

    /**
     * @param int|null $selfReportedMarketCap
     * @return Cryptocurrency
     */
    public function setSelfReportedMarketCap(?int $selfReportedMarketCap): Cryptocurrency
    {
        $this->selfReportedMarketCap = $selfReportedMarketCap;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * @param Tag[] $tags
     * @return Cryptocurrency
     */
    public function setTags(array $tags): Cryptocurrency
    {
        $this->tags = new ArrayCollection($tags);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getQuotes(): Collection
    {
        return $this->quotes;
    }

    /**
     * @param Quote[] $quotes
     * @return Cryptocurrency
     */
    public function setQuotes(array $quotes): Cryptocurrency
    {
        $this->quotes = new ArrayCollection($quotes);
        return $this;
    }

    /**
     * @return int
     */
    public function getExternalId(): int
    {
        return $this->externalId;
    }

    /**
     * @param int $externalId
     * @return Cryptocurrency
     */
    public function setExternalId(int $externalId): Cryptocurrency
    {
        $this->externalId = $externalId;
        return $this;
    }
}
