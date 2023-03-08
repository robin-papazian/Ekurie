<?php

namespace App\Entity;


use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Patch;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiFilter;
use App\Repository\EkurieRepository;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EkurieRepository::class)]
#[ApiResource(
    description: "A community that offer studies materials for exams preparation on various university paths",
    operations: [
        new Get(
            normalizationContext: [
                'groups' => ['ekurie:read', 'ekurie:item:read']
            ],
        ),
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
#[UniqueEntity(fields: ['name'], message: 'Ce nom d\'Ekurie existe déjà.')]
class Ekurie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: 'name', type: 'string', length: 50, unique: true)]
    #[Groups(['ekurie:read', 'ekurie:write'])]
    #[ApiFilter(SearchFilter::class, strategy: 'partial')]
    #[Assert\NotBlank]
    #[Assert\Length(min: 4, max: 20, maxMessage: 'Le nom d\'une Ekurie est limité à 20 caractères')]
    private string $name;

    #[ORM\OneToMany(mappedBy: 'ekurie', targetEntity: Semester::class)]
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

    public function getName(): string
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
