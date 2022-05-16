<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Class Reference
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\ReferenceRepository")
 */
class Reference{

    /**
     * @var int|null
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @ORM\Column(type="integer")
     * @Groups({"get"})
     */
    private ?int $id = null;

    /**
     * @var string|null
     * @ORM\Column
     * @Assert\NotBlank (message="ce champs ne peux pas être vide.")
     * @Groups({"get"})
     */
    private ?string $title = null;

    /**
     * @var string|null
     * @ORM\Column
     * @Assert\NotBlank (message="ce champs ne peux pas être vide.")
     * @Groups({"get"})
     */
    private ?string $company = null;

    /**
     * @var string|null
     * @ORM\Column(type="text")
     * @Assert\NotBlank (message="ce champs ne peux pas être vide.")
     * @Groups({"get"})
     */
    private ?string $description = null;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="date_immutable")
     * @Assert\NotBlank (message="ce champs ne peux pas être vide.")
     * @Groups({"get"})
     */
    private ?DateTimeInterface $startedAt = null;

    /**
     * @var DateTimeInterface|null
     * @ORM\Column(type="date_immutable", nullable=true)
     * @Groups({"get"})
     */
    private ?DateTimeInterface $endedAt = null;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Media",mappedBy="reference", cascade={"persist"}, orphanRemoval=true)
     * @Assert\Count(min=1, minMessage="Vous devez ajouter au moins 1 image.")
     * @Groups({"get"})
     */
    private Collection $medias;

    /**
     * Reference Constructor
    */
    public function __construct()
    {
        $this->medias = new ArrayCollection();
    }

    /**
     * Get the value of id
     *
     * @return  int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of title
     *
     * @return  string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param  string|null  $title
     *
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * Get the value of company
     *
     * @return  string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @param  string|null  $company
     */
    public function setCompany($company): void
    {
        $this->company = $company;
    }

    /**
     * Get the value of description
     *
     * @return  string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string|null  $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * Get the value of startedAt
     *
     * @return  DateTimeInterface|null
     */
    public function getStartedAt(): ?DateTimeInterface
    {
        return $this->startedAt;
    }

    /**
     * Set the value of startedAt
     *
     * @param  DateTimeInterface|null  $startedAt
     *     */
    public function setStartedAt($startedAt): void
    {
        $this->startedAt = $startedAt;
    }

    /**
     * Get the value of endedAt
     *
     * @return  DateTimeInterface|null
     */
    public function getEndedAt(): ?DateTimeInterface
    {
        return $this->endedAt;
    }

    /**
     * Set the value of endedAt
     *
     * @param  DateTimeInterface|null  $endedAt
     */
    public function setEndedAt($endedAt): void
    {
        $this->endedAt = $endedAt;
    }

    public function getMedias(): Collection
    {
        return $this->medias;
    }

    /**
     * @param Media $media
     */
    public function addMedia(Media $media): void
    {
        if(!$this->medias->contains($media)){
            $media->setReference($this);
            $this->medias->add($media);
        }
    }

    /**
     * @param Media $media
     */
    public function removeMedia(Media $media): void
    {
        if($this->medias->contains($media)){
            $media->setReference(null);
            $this->medias->removeElement($media);
        }
    }
}