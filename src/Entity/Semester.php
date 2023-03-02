<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SemesterRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: SemesterRepository::class)]
#[ApiResource(
    description: 'Period of the year of a university path',
    normalizationContext: [
        'groups' => ['semester:read'],
    ],
    denormalizationContext: [
        'groups' => ['semester:write'],
    ],
)]
class Semester
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('semester:read')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['semester:read', 'semester:write'])]
    private ?string $enumerate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups('semester:read')]
    private ?\DateTimeInterface $starting_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    #[Groups('semester:read')]
    private ?\DateTimeInterface $ending_date = null;

    #[ORM\ManyToOne(inversedBy: 'semesters')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups('semester:read')]
    private ?Ekurie $ekurie_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Period of the year 
     * 
     * @return string|null
     */
    public function getEnumerate(): ?string
    {
        return $this->enumerate;
    }

    public function setEnumerate(string $enumerate): self
    {
        $this->enumerate = $enumerate;

        return $this;
    }

    public function setBitch(): int
    {
        return 0;
    }

    public function getStartingDate(): ?\DateTimeInterface
    {
        return $this->starting_date;
    }

    #[Groups('semester:write')]
    public function setStartingDate(?\DateTimeInterface $starting_date): self
    {
        $this->starting_date = $starting_date;

        return $this;
    }

    public function getEndingDate(): ?\DateTimeInterface
    {
        return $this->ending_date;
    }

    #[Groups('semester:write')]
    public function setEndingDate(?\DateTimeInterface $ending_date): self
    {
        $this->ending_date = $ending_date;

        return $this;
    }

    public function getEkurieId(): ?Ekurie
    {
        return $this->ekurie_id;
    }

    #[Groups('semester:write')]
    public function setEkurieId(?Ekurie $ekurie_id): self
    {
        $this->ekurie_id = $ekurie_id;

        return $this;
    }
}
