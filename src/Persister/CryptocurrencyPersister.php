<?php

declare(strict_types=1);

namespace App\Persister;

use App\Entity\Cryptocurrency;
use App\Exception\CryptocurrencyNotFoundException;
use App\Repository\CryptocurrencyRepository;
use Doctrine\ORM\EntityManagerInterface;

class CryptocurrencyPersister
{
    public function __construct(
        readonly private EntityManagerInterface $entityManager,
        readonly private CryptocurrencyRepository $cryptocurrencyRepository,
    ) {
    }

    public function upsert(Cryptocurrency $cryptocurrency): void
    {
        try {
            $oldCryptocurrency = $this->cryptocurrencyRepository->findOneByExternalId($cryptocurrency->getExternalId());

            $oldCryptocurrency
                ->setCmcRank($cryptocurrency->getCmcRank())
                ->setCirculatingSupply($cryptocurrency->getCirculatingSupply())
                ->setName($cryptocurrency->getName())
                ->setDateAdded($cryptocurrency->getDateAdded())
                ->setInfiniteSupply($cryptocurrency->isInfiniteSupply())
                ->setLastUpdate($cryptocurrency->getLastUpdate())
                ->setMaxSupply($cryptocurrency->getMaxSupply())
                ->setNumMarketPairs($cryptocurrency->getNumMarketPairs())
                ->setPlatform($cryptocurrency->getPlatform())
                ->setSelfReportedCirculatingSupply($cryptocurrency->getSelfReportedCirculatingSupply())
                ->setSelfReportedMarketCap($cryptocurrency->getSelfReportedMarketCap())
                ->setSlug($cryptocurrency->getSlug())
                ->setSymbol($cryptocurrency->getSymbol())
                ->setTotalSupply($cryptocurrency->getTotalSupply())
                ->setTags($cryptocurrency->getTags()->toArray())
                ->setQuotes($cryptocurrency->getQuotes()->toArray());

            $this->entityManager->persist($oldCryptocurrency);
        } catch (CryptocurrencyNotFoundException) {
            // Only persist if it's new data entry
            $this->entityManager->persist($cryptocurrency);
        }
    }
}