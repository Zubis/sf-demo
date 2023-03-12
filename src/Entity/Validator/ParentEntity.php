<?php

namespace App\Entity\Validator;

use App\Repository\Validator\ParentEntityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ParentEntityRepository::class)
 */
#[Assert\Cascade]
class ParentEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    #[
        Assert\NotBlank(message: 'comment.blank'),
        Assert\Length(
            min: 5,
            minMessage: 'comment.too_short',
            max: 255,
            maxMessage: 'comment.too_long',
        )
    ]
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=ChildEntity::class, mappedBy="parentEntity", orphanRemoval=true)
     */
    private ArrayCollection $child;

    /**
     * @ORM\OneToOne(targetEntity=ChildEntity::class, cascade={"persist", "remove"})
     */
    private ChildEntity $singleChild;

    public function __construct()
    {
        $this->child = new ArrayCollection();
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
     * @return Collection|ChildEntity[]
     */
    public function getChild(): Collection
    {
        return $this->child;
    }

    public function addChild(ChildEntity $child): self
    {
        if (!$this->child->contains($child)) {
            $this->child[] = $child;
            $child->setParentEntity($this);
        }

        return $this;
    }

    public function removeChild(ChildEntity $child): self
    {
        if ($this->child->removeElement($child)) {
            // set the owning side to null (unless already changed)
            if ($child->getParentEntity() === $this) {
                $child->setParentEntity(null);
            }
        }

        return $this;
    }

    public function getSingleChild(): ?ChildEntity
    {
        return $this->singleChild;
    }

    public function setSingleChild(?ChildEntity $singleChild): self
    {
        $this->singleChild = $singleChild;
        $this->singleChild->setParentEntity($this);

        return $this;
    }
}
