<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Entity\Trait\EntityIdTrait;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity]
class Tag
{
    use EntityIdTrait;
    use TimestampableEntity;

    #[ORM\Column(type: 'string')]
    private string $value;

    #[ORM\ManyToOne(targetEntity: Cryptocurrency::class, inversedBy: 'tags')]
    #[ORM\JoinColumn(name: 'cryptocurrency_id', referencedColumnName: 'id')]
    private Cryptocurrency $cryptocurrency;

    public function __construct(
        string $value
    ){
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): Tag
    {
        $this->value = $value;

        return $this;
    }

    public function getCryptocurrency(): Cryptocurrency
    {
        return $this->cryptocurrency;
    }

    public function setCryptocurrency(Cryptocurrency $cryptocurrency): Tag
    {
        $this->cryptocurrency = $cryptocurrency;
        return $this;
    }
}