<?php

namespace App\Entity\Validator;

use App\Repository\ChildEntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ChildEntityRepository::class)
 */
class ChildEntity
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
     * @ORM\ManyToOne(targetEntity=ParentEntity::class, inversedBy="child")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parentEntity;

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

    public function getParentEntity(): ?ParentEntity
    {
        return $this->parentEntity;
    }

    public function setParentEntity(?ParentEntity $parentEntity): self
    {
        $this->parentEntity = $parentEntity;

        return $this;
    }
}
