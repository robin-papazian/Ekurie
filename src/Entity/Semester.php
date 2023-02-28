<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SemesterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SemesterRepository::class)]
#[ApiResource]
class Semester
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $enumerate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $starting_date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $ending_date = null;

    #[ORM\ManyToOne(inversedBy: 'semesters')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ekurie $ekurie_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnumerate(): ?string
    {
        return $this->enumerate;
    }

    public function setEnumerate(string $enumerate): self
    {
        $this->enumerate = $enumerate;

        return $this;
    }

    public function getStartingDate(): ?\DateTimeInterface
    {
        return $this->starting_date;
    }

    public function setStartingDate(?\DateTimeInterface $starting_date): self
    {
        $this->starting_date = $starting_date;

        return $this;
    }

    public function getEndingDate(): ?\DateTimeInterface
    {
        return $this->ending_date;
    }

    public function setEndingDate(?\DateTimeInterface $ending_date): self
    {
        $this->ending_date = $ending_date;

        return $this;
    }

    public function getEkurieId(): ?Ekurie
    {
        return $this->ekurie_id;
    }

    public function setEkurieId(?Ekurie $ekurie_id): self
    {
        $this->ekurie_id = $ekurie_id;

        return $this;
    }
}
