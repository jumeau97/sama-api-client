<?php

namespace App\Entity;

use App\Repository\SubscribeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\ArrayShape;
use JsonSerializable;

#[ORM\Entity(repositoryClass: SubscribeRepository::class)]
class Subscribe implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(nullable: true)]
    private ?float $price = null;

    #[ORM\OneToMany(mappedBy: 'subscribe', targetEntity: SubscribeOption::class)]
    private Collection $subscribeOptions;

    #[ORM\OneToMany(mappedBy: 'subscribe', targetEntity: SubscribeTerm::class)]
    private Collection $subscribeTerms;

    public function __construct()
    {
        $this->subscribeOptions = new ArrayCollection();
        $this->subscribeTerms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return Collection<int, SubscribeOption>
     */
    public function getSubscribeOptions(): Collection
    {
        return $this->subscribeOptions;
    }

    public function addSubscribeOption(SubscribeOption $subscribeOption): self
    {
        if (!$this->subscribeOptions->contains($subscribeOption)) {
            $this->subscribeOptions->add($subscribeOption);
            $subscribeOption->setSubscribe($this);
        }

        return $this;
    }

    public function removeSubscribeOption(SubscribeOption $subscribeOption): self
    {
        if ($this->subscribeOptions->removeElement($subscribeOption)) {
            // set the owning side to null (unless already changed)
            if ($subscribeOption->getSubscribe() === $this) {
                $subscribeOption->setSubscribe(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SubscribeTerm>
     */
    public function getSubscribeTerms(): Collection
    {
        return $this->subscribeTerms;
    }

    public function addSubscribeTerm(SubscribeTerm $subscribeTerm): self
    {
        if (!$this->subscribeTerms->contains($subscribeTerm)) {
            $this->subscribeTerms->add($subscribeTerm);
            $subscribeTerm->setSubscribe($this);
        }

        return $this;
    }

    public function removeSubscribeTerm(SubscribeTerm $subscribeTerm): self
    {
        if ($this->subscribeTerms->removeElement($subscribeTerm)) {
            // set the owning side to null (unless already changed)
            if ($subscribeTerm->getSubscribe() === $this) {
                $subscribeTerm->setSubscribe(null);
            }
        }

        return $this;
    }

    #[ArrayShape(["id" => "int|null", "name" => "null|string", "type" => "null|string", "price" => "float|null" ])]
    public function jsonSerialize(): array
    {
        return ["id"=>$this->getId(),"name"=>$this->getName(),"type"=>$this->getType(),"price"=>$this->getPrice()];
    }
}
