<?php

namespace App\Entity;

use App\Repository\TiendaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(targetEntity: Usuario::class, mappedBy: 'tienda')]
    private Collection $usuarios;

    #[ORM\OneToMany(targetEntity: Noticia::class, mappedBy: 'tienda')]
    private Collection $noticias;

    #[ORM\OneToMany(targetEntity: Edicion::class, mappedBy: 'tienda')]
    private Collection $edicions;

    public function __construct()
    {
        $this->usuarios = new ArrayCollection();
        $this->noticias = new ArrayCollection();
        $this->edicions = new ArrayCollection();
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

    /**
     * @return Collection<int, Usuario>
     */
    public function getUsuarios(): Collection
    {
        return $this->usuarios;
    }

    public function addUsuario(Usuario $usuario): static
    {
        if (!$this->usuarios->contains($usuario)) {
            $this->usuarios->add($usuario);
            $usuario->setTienda($this);
        }

        return $this;
    }

    public function removeUsuario(Usuario $usuario): static
    {
        if ($this->usuarios->removeElement($usuario)) {
            // set the owning side to null (unless already changed)
            if ($usuario->getTienda() === $this) {
                $usuario->setTienda(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Noticia>
     */
    public function getNoticias(): Collection
    {
        return $this->noticias;
    }

    public function addNoticia(Noticia $noticia): static
    {
        if (!$this->noticias->contains($noticia)) {
            $this->noticias->add($noticia);
            $noticia->setTienda($this);
        }

        return $this;
    }

    public function removeNoticia(Noticia $noticia): static
    {
        if ($this->noticias->removeElement($noticia)) {
            // set the owning side to null (unless already changed)
            if ($noticia->getTienda() === $this) {
                $noticia->setTienda(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Edicion>
     */
    public function getEdicions(): Collection
    {
        return $this->edicions;
    }

    public function addEdicion(Edicion $edicion): static
    {
        if (!$this->edicions->contains($edicion)) {
            $this->edicions->add($edicion);
            $edicion->setTienda($this);
        }

        return $this;
    }

    public function removeEdicion(Edicion $edicion): static
    {
        if ($this->edicions->removeElement($edicion)) {
            // set the owning side to null (unless already changed)
            if ($edicion->getTienda() === $this) {
                $edicion->setTienda(null);
            }
        }

        return $this;
    }
}
