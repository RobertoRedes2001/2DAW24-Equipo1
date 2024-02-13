<?php

namespace App\Entity;

use App\Repository\CartaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CartaRepository::class)]
class Carta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "carta_cod")]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nombre = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $habilidad_recurso = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $habilidad_batalla = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coste = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $estado_carta = null;

    #[ORM\Column(nullable: true)]
    private ?int $vida = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rareza = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $observaciones = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $foto = null;

    #[ORM\Column(nullable: true)]
    private ?int $defensa = null;

    #[ORM\Column(nullable: true)]
    private ?int $ataque = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $tipo_carta = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $texto = null;

    #[ORM\Column(nullable: true)]
    private ?int $puntos_victoria = null;

    #[ORM\ManyToMany(targetEntity: Edicion::class, inversedBy: 'cartas')]
    #[ORM\JoinColumn(name: "edicion", referencedColumnName: "carta_cod")]
    private Collection $edicion;

    public function __construct()
    {
        $this->edicion = new ArrayCollection();
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

    public function getHabilidadRecurso(): ?string
    {
        return $this->habilidad_recurso;
    }

    public function setHabilidadRecurso(?string $habilidad_recurso): static
    {
        $this->habilidad_recurso = $habilidad_recurso;

        return $this;
    }

    public function getHabilidadBatalla(): ?string
    {
        return $this->habilidad_batalla;
    }

    public function setHabilidadBatalla(?string $habilidad_batalla): static
    {
        $this->habilidad_batalla = $habilidad_batalla;

        return $this;
    }

    public function getCoste(): ?string
    {
        return $this->coste;
    }

    public function setCoste(?string $coste): static
    {
        $this->coste = $coste;

        return $this;
    }

    public function getEstadoCarta(): ?string
    {
        return $this->estado_carta;
    }

    public function setEstadoCarta(?string $estado_carta): static
    {
        $this->estado_carta = $estado_carta;

        return $this;
    }

    public function getVida(): ?int
    {
        return $this->vida;
    }

    public function setVida(?int $vida): static
    {
        $this->vida = $vida;

        return $this;
    }

    public function getRareza(): ?string
    {
        return $this->rareza;
    }

    public function setRareza(?string $rareza): static
    {
        $this->rareza = $rareza;

        return $this;
    }

    public function getObservaciones(): ?string
    {
        return $this->observaciones;
    }

    public function setObservaciones(?string $observaciones): static
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): static
    {
        $this->foto = $foto;

        return $this;
    }

    public function getDefensa(): ?int
    {
        return $this->defensa;
    }

    public function setDefensa(?int $defensa): static
    {
        $this->defensa = $defensa;

        return $this;
    }

    public function getAtaque(): ?int
    {
        return $this->ataque;
    }

    public function setAtaque(?int $ataque): static
    {
        $this->ataque = $ataque;

        return $this;
    }

    public function getTipoCarta(): ?string
    {
        return $this->tipo_carta;
    }

    public function setTipoCarta(?string $tipo_carta): static
    {
        $this->tipo_carta = $tipo_carta;

        return $this;
    }

    public function getTexto(): ?string
    {
        return $this->texto;
    }

    public function setTexto(?string $texto): static
    {
        $this->texto = $texto;

        return $this;
    }

    public function getPuntosVictoria(): ?int
    {
        return $this->puntos_victoria;
    }

    public function setPuntosVictoria(?int $puntos_victoria): static
    {
        $this->puntos_victoria = $puntos_victoria;

        return $this;
    }

    /**
     * @return Collection<int, Edicion>
     */
    public function getEdicion(): Collection
    {
        return $this->edicion;
    }

    public function addEdicion(Edicion $edicion): static
    {
        if (!$this->edicion->contains($edicion)) {
            $this->edicion->add($edicion);
        }

        return $this;
    }

    public function removeEdicion(Edicion $edicion): static
    {
        $this->edicion->removeElement($edicion);

        return $this;
    }
}
