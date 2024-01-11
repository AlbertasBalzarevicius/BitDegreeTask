<?php

declare(strict_types=1);

namespace App\Importer;

use App\Client\CoinMarketCap\CoinMarketCapClient;
use App\Exception\CryptocurrencyImportFailedException;
use App\Factory\CryptocurrencyFactory;
use App\Persister\CryptocurrencyPersister;
use Doctrine\ORM\EntityManagerInterface;
use GuzzleHttp\Exception\GuzzleException;

class CryptocurrencyImporter
{
    public function __construct(
        readonly private CoinMarketCapClient $client,
        readonly private EntityManagerInterface $entityManager,
        readonly private CryptocurrencyFactory $cryptocurrencyFactory,
        readonly private CryptocurrencyPersister $cryptocurrencyPersister,
    ) {
    }

    public function import(): void
    {
        try {
            $cryptocurrencies = $this->cryptocurrencyFactory->createManyFromDTO(
                $this->client->getLatestCryptocurrencies(),
            );
        } catch (GuzzleException $e) {
            throw new CryptocurrencyImportFailedException(
                $e->getMessage(),
            );
        }

        foreach ($cryptocurrencies as $cryptocurrency) {
            $this->cryptocurrencyPersister->upsert($cryptocurrency);
        }

        $this->entityManager->flush();
    }
}