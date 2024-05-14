<?php

namespace App\Entity;

use App\Repository\MaterialsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterialsRepository::class)]
class Materials
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Type = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(nullable: true)]
    private ?int $Thickness = null;

    #[ORM\Column(nullable: true)]
    private ?float $FullPallet = null;

    #[ORM\Column]
    private ?float $Price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?int
    {
        return $this->Type;
    }

    public function setType(int $Type): static
    {
        $this->Type = $Type;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getThickness(): ?int
    {
        return $this->Thickness;
    }

    public function setThickness(?int $Thickness): static
    {
        $this->Thickness = $Thickness;

        return $this;
    }

    public function getFullPallet(): ?float
    {
        return $this->FullPallet;
    }

    public function setFullPallet(?float $FullPallet): static
    {
        $this->FullPallet = $FullPallet;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): static
    {
        $this->Price = $Price;

        return $this;
    }
}
