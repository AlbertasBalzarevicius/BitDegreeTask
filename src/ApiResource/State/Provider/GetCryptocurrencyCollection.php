<?php

declare(strict_types=1);

namespace App\ApiResource\State\Provider;

use ApiPlatform\Doctrine\Orm\Paginator;
use ApiPlatform\Metadata\CollectionOperationInterface;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\Pagination\Pagination;
use ApiPlatform\State\ProviderInterface;
use App\Repository\CryptocurrencyRepository;

class GetCryptocurrencyCollection implements ProviderInterface
{
   public function __construct(
       readonly private Pagination $pagination,
       readonly private CryptocurrencyRepository $cryptocurrencyRepository,
   ){
   }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|array|null
    {
        if (!$operation instanceof CollectionOperationInterface) {
            throw new \LogicException('Invalid operation');
        }
        [$page, , $limit] = $this->pagination->getPagination($operation, $context);

        return new Paginator(
            $this->cryptocurrencyRepository->getPagination($page, $limit)
        );
    }
}