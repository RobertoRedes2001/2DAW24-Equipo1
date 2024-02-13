<?php

namespace App\Entity;

use App\Repository\EdicionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EdicionRepository::class)]
class Edicion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "edicion_cod")]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nombre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $fecha_salida = null;

    #[ORM\Column(nullable: true)]
    private ?int $cantidad = null;

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
}
