<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoomRepository::class)]
class Room
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Image = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(length: 255)]
    private ?string $Price = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $GaleryImage = null;

    #[ORM\Column(length: 255)]
    private ?string $Hotel = null;

    #[ORM\ManyToOne(inversedBy: 'rooms')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Hotel $Id_Hotel = null;

    #[ORM\OneToMany(mappedBy: 'id_Room', targetEntity: Photo::class)]
    private Collection $photos;

    #[ORM\OneToMany(mappedBy: 'id_room', targetEntity: Reservation::class)]
    private Collection $reservations;

    public function __construct()
    {
        $this->photos = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->Price;
    }

    public function setPrice(string $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getGaleryImage(): ?string
    {
        return $this->GaleryImage;
    }

    public function setGaleryImage(?string $GaleryImage): self
    {
        $this->GaleryImage = $GaleryImage;

        return $this;
    }

    public function getHotel(): ?string
    {
        return $this->Hotel;
    }

    public function setHotel(string $Hotel): self
    {
        $this->Hotel = $Hotel;

        return $this;
    }

    public function getIdHotel(): ?Hotel
    {
        return $this->Id_Hotel;
    }

    public function setIdHotel(?Hotel $Id_Hotel): self
    {
        $this->Id_Hotel = $Id_Hotel;

        return $this;
    }

    /**
     * @return Collection<int, Photo>
     */
    public function getPhotos(): Collection
    {
        return $this->photos;
    }

    public function addPhoto(Photo $photo): self
    {
        if (!$this->photos->contains($photo)) {
            $this->photos->add($photo);
            $photo->setIdRoom($this);
        }

        return $this;
    }

    public function removePhoto(Photo $photo): self
    {
        if ($this->photos->removeElement($photo)) {
            // set the owning side to null (unless already changed)
            if ($photo->getIdRoom() === $this) {
                $photo->setIdRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setIdRoom($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getIdRoom() === $this) {
                $reservation->setIdRoom(null);
            }
        }

        return $this;
    }
}
