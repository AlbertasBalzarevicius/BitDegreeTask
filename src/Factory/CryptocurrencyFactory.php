<?php

declare(strict_types=1);

namespace App\Factory;

use App\Client\CoinMarketCap\DTO\CryptocurrencyDTO;
use App\Entity\Cryptocurrency;

class CryptocurrencyFactory
{
    public function __construct(
        readonly private TagFactory $tagFactory,
        readonly private QuoteFactory $quoteFactory,
    ) {
    }

    public function createFromDTO(CryptocurrencyDTO $cryptocurrencyDTO): Cryptocurrency
    {
        $cryptocurrency = new Cryptocurrency(
            $cryptocurrencyDTO->getExternalId(),
            $cryptocurrencyDTO->getName(),
            $cryptocurrencyDTO->getSymbol(),
            $cryptocurrencyDTO->getSlug(),
            $cryptocurrencyDTO->getCmcRank(),
            $cryptocurrencyDTO->getNumMarketPairs(),
            $cryptocurrencyDTO->getCirculatingSupply(),
            $cryptocurrencyDTO->getTotalSupply(),
            $cryptocurrencyDTO->getMaxSupply(),
            $cryptocurrencyDTO->isInfiniteSupply(),
            $cryptocurrencyDTO->getLastUpdate(),
            $cryptocurrencyDTO->getDateAdded(),
            $cryptocurrencyDTO->getPlatform(),
            $cryptocurrencyDTO->getSelfReportedCirculatingSupply(),
            $cryptocurrencyDTO->getSelfReportedMarketCap(),
        );

        $cryptocurrency->setTags($this->tagFactory->createMany($cryptocurrencyDTO->getTags()));
        $cryptocurrency->setQuotes($this->quoteFactory->createManyFromDTOs($cryptocurrencyDTO->getQuotes()));

        return $cryptocurrency;
    }

    /**
     * @return Cryptocurrency[]
     */
    public function createManyFromDTO(array $cryptocurrencyDTOs): array
    {
        return \array_map(
            fn(CryptocurrencyDTO $cryptocurrencyDTO): Cryptocurrency => $this->createFromDTO($cryptocurrencyDTO),
            $cryptocurrencyDTOs,
        );
    }
}