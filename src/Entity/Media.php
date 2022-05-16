<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Media
 * @package App\Entity
 * @ORM\Entity
 * @ORM\EntityListeners({"App\EntityListener\MediaListener"})
 */

CLass Media
{
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
     * @Groups({"get"})
     */
    private ?string $path = null;

    /**
     * @var UploadedFile|null
     * @Assert\Image
     */
    private ?UploadedFile $file = null;
    /**
     * @var Reference|null
     * @ORM\ManyToOne(targetEntity="Reference",inversedBy="medias")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private ?Reference $reference;

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
     * Get the value of path
     *
     * @return  string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * Set the value of path
     *
     * @param  string|null  $path
     *
     */
    public function setPath($path): void
    {
        $this->path = $path;
    }

    /**
     * Get the value of reference
     *
     * @return  Reference|null
     */
    public function getReference(): ?Reference
    {
        return $this->reference;
    }

    /**
     * Set the value of reference
     *
     * @param  Reference|null  $reference
     */
    public function setReference($reference): void
    {
        $this->reference = $reference;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFile(): ?UploadedFile
    {
        return $this->file;
    }

    /**
     * @param UploadedFile|null $file
     */
    public function setFile(?UploadedFile $file): void
    {
        $this->file = $file;
    }
}