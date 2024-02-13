<?php

namespace App\Entity;

use App\Repository\TiendaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TiendaRepository::class)]
class Tienda
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "tienda_cod")]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nombre = null;

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
}
