<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
class Photo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Link = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    private ?Hotel $id_Hotel = null;

    #[ORM\ManyToOne(inversedBy: 'photos')]
    private ?Room $id_Room = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLink(): ?string
    {
        return $this->Link;
    }

    public function setLink(string $Link): self
    {
        $this->Link = $Link;

        return $this;
    }

    public function getIdHotel(): ?Hotel
    {
        return $this->id_Hotel;
    }

    public function setIdHotel(?Hotel $id_Hotel): self
    {
        $this->id_Hotel = $id_Hotel;

        return $this;
    }

    public function getIdRoom(): ?Room
    {
        return $this->id_Room;
    }

    public function setIdRoom(?Room $id_Room): self
    {
        $this->id_Room = $id_Room;

        return $this;
    }
}
