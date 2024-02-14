<?php

namespace App\Entity;

use App\Repository\CartaEdicionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartaEdicionRepository::class)]
class CartaEdicion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cartaEdicions')]
    #[ORM\JoinColumn(name: "carta_id", referencedColumnName: "carta_cod")]
    private ?Carta $carta_id = null;

    #[ORM\ManyToOne(inversedBy: 'cartaEdicions')]
    #[ORM\JoinColumn(name: "edicion_id", referencedColumnName: "edicion_cod")]
    private ?Edicion $edicion_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCartaId(): ?Carta
    {
        return $this->carta_id;
    }

    public function setCartaId(?Carta $carta_id): static
    {
        $this->carta_id = $carta_id;

        return $this;
    }

    public function getEdicionId(): ?Edicion
    {
        return $this->edicion_id;
    }

    public function setEdicionId(?Edicion $edicion_id): static
    {
        $this->edicion_id = $edicion_id;

        return $this;
    }
}
