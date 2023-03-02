<?php

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EkurieRepository;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: EkurieRepository::class)]
#[ApiResource(
    description: "A community that offer studies materials for exams preparation on various university paths",
    operations: [
        new Get(),
        new GetCollection(),
        new Post(),
        new Patch(),
        new Put()
    ],
    normalizationContext: [
        'groups' => ['ekurie:read']
    ],
    denormalizationContext: [
        'groups' => ['ekurie:write']
    ]
)]
class Ekurie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups('ekurie:read')]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['ekurie:read', 'ekurie:write'])]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'ekurie_id', targetEntity: Semester::class)]
    #[Groups(['ekurie:read'])]
    private Collection $semesters;

    public function __construct()
    {
        $this->semesters = new ArrayCollection();
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

    /**
     * @return Collection<int, Semester>
     */
    public function getSemesters(): Collection
    {
        return $this->semesters;
    }

    public function addSemester(Semester $semester): self
    {
        if (!$this->semesters->contains($semester)) {
            $this->semesters->add($semester);
            $semester->setEkurieId($this);
        }

        return $this;
    }

    public function removeSemester(Semester $semester): self
    {
        if ($this->semesters->removeElement($semester)) {
            // set the owning side to null (unless already changed)
            if ($semester->getEkurieId() === $this) {
                $semester->setEkurieId(null);
            }
        }

        return $this;
    }
}
