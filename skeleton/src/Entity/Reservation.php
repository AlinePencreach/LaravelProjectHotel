<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Checkin = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Checkout = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?Room $id_room = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    private ?User $id_user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCheckin(): ?\DateTimeInterface
    {
        return $this->Checkin;
    }

    public function setCheckin(\DateTimeInterface $Checkin): self
    {
        $this->Checkin = $Checkin;

        return $this;
    }

    public function getCheckout(): ?\DateTimeInterface
    {
        return $this->Checkout;
    }

    public function setCheckout(\DateTimeInterface $Checkout): self
    {
        $this->Checkout = $Checkout;

        return $this;
    }

    public function getIdRoom(): ?Room
    {
        return $this->id_room;
    }

    public function setIdRoom(?Room $id_room): self
    {
        $this->id_room = $id_room;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}
