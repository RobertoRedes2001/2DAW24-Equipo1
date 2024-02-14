<?php

namespace App\Entity;

use App\Repository\EdicionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EdicionRepository::class)]
class Edicion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'edicion_cod')]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fecha_salida = null;

    #[ORM\Column(nullable: true)]
    private ?int $cantidad = null;

    #[ORM\ManyToOne(inversedBy: 'edicions')]
    #[ORM\JoinColumn(name: "tienda", referencedColumnName: "tienda_cod")]
    private ?Tienda $tienda = null;

    #[ORM\OneToMany(targetEntity: CartaEdicion::class, mappedBy: 'edicion_id')]
    private Collection $cartaEdicions;

    public function __construct()
    {
        $this->cartas = new ArrayCollection();
        $this->carta_cod = new ArrayCollection();
        $this->cartaEdicions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFechaSalida(): ?\DateTimeInterface
    {
        return $this->fecha_salida;
    }

    public function setFechaSalida(?\DateTimeInterface $fecha_salida): static
    {
        $this->fecha_salida = $fecha_salida;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->cantidad;
    }

    public function setCantidad(?int $cantidad): static
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getTienda(): ?Tienda
    {
        return $this->tienda;
    }

    public function setTienda(?Tienda $tienda): static
    {
        $this->tienda = $tienda;

        return $this;
    }

    /**
     * @return Collection<int, CartaEdicion>
     */
    public function getCartaEdicions(): Collection
    {
        return $this->cartaEdicions;
    }

    public function addCartaEdicion(CartaEdicion $cartaEdicion): static
    {
        if (!$this->cartaEdicions->contains($cartaEdicion)) {
            $this->cartaEdicions->add($cartaEdicion);
            $cartaEdicion->setEdicionId($this);
        }

        return $this;
    }

    public function removeCartaEdicion(CartaEdicion $cartaEdicion): static
    {
        if ($this->cartaEdicions->removeElement($cartaEdicion)) {
            // set the owning side to null (unless already changed)
            if ($cartaEdicion->getEdicionId() === $this) {
                $cartaEdicion->setEdicionId(null);
            }
        }

        return $this;
    }
}
