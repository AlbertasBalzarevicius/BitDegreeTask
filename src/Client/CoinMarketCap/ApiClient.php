<?php

declare(strict_types=1);

namespace App\Client\CoinMarketCap;

use App\Client\CoinMarketCap\DTO\CryptocurrencyDTO;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\Serializer\Serializer;

class ApiClient
{
    public function __construct(
        readonly private CoinMarketCapClient $client,
        readonly private Serializer $serializer,
    ) {
    }

    /**
     * @return CryptocurrencyDTO[]
     * @throws GuzzleException
     */
    public function getLatestCryptocurrencies(): array
    {
        $response = $this->client->request('GET','/cryptocurrency/listing/latest');

        return $this->serializer->deserialize(
            $response->getBody(),
            CryptocurrencyDTO::class,
            'json'
        );
    }
}