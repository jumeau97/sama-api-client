<?php

namespace App\Entity;

use App\Repository\SubscribeTermRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubscribeTermRepository::class)]
class SubscribeTerm implements \JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $term = null;

    #[ORM\Column(nullable: true)]
    private ?float $discountAmount = null;

    #[ORM\ManyToOne(inversedBy: 'subscribeTerms')]
    private ?Subscribe $subscribe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTerm(): ?string
    {
        return $this->term;
    }

    public function setTerm(?string $term): self
    {
        $this->term = $term;

        return $this;
    }

    public function getDiscountAmount(): ?float
    {
        return $this->discountAmount;
    }

    public function setDiscountAmount(?float $discountAmount): self
    {
        $this->discountAmount = $discountAmount;

        return $this;
    }

    public function getSubscribe(): ?Subscribe
    {
        return $this->subscribe;
    }

    public function setSubscribe(?Subscribe $subscribe): self
    {
        $this->subscribe = $subscribe;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return ["id"=>$this->getId(),"term"=>$this->getTerm(),"amount"=> $this->getDiscountAmount(),"subscribe"=>$this->getSubscribe()];;
    }
}
