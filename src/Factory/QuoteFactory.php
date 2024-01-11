<?php

declare(strict_types=1);

namespace App\Factory;

use App\Client\CoinMarketCap\DTO\QuoteDTO;
use App\Entity\Quote;

class QuoteFactory
{
    public function createFromDTO(QuoteDTO $quoteDTO): Quote
    {
        return new Quote(
            $quoteDTO->getSymbol(),
            $quoteDTO->getPrice(),
            $quoteDTO->getVolume24h(),
            $quoteDTO->getMarketCap(),
            $quoteDTO->getMarketCapDominance(),
            $quoteDTO->getFullyDilutedMarketCap(),
        );
    }

    /**
     * @param QuoteDTO[] $quotes
     * @return Quote[]
     */
    public function createManyFromDTOs(array $quotes): array
    {
        return \array_map(
            fn(QuoteDTO $quote): Quote => $this->createFromDTO($quote),
            $quotes,
        );
    }

}