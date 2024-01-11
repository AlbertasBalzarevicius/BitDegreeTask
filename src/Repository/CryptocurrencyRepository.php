<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Cryptocurrency;
use App\Exception\CryptocurrencyNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePagination;

class CryptocurrencyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cryptocurrency::class);
    }

    /**
     * @throws CryptocurrencyNotFoundException
     */
    public function findOneByExternalId(int $externalId): Cryptocurrency
    {
        $cryptocurrency = $this->findOneBy(['externalId' => $externalId]);

        if ($cryptocurrency === null) {
            throw new CryptocurrencyNotFoundException();
        }

        return $cryptocurrency;
    }

    public function getPagination(int $page = 1, int $items = 30): DoctrinePagination
    {
        return new DoctrinePagination(
            $this->createQueryBuilder('cryptocurrency')
                ->addCriteria(
                    Criteria::create()
                    ->setFirstResult(($page - 1) * $items)
                    ->setMaxResults($items)
                )
        );
    }
}