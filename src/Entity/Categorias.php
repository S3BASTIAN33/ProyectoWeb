<?php

namespace App\Entity;

use App\Repository\CategoriasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoriasRepository::class)
 */
class Categorias
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\OneToMany(targetEntity=Hospcat::class, mappedBy="categoria")
     */
    private $hospcats;

    /**
     * @ORM\OneToMany(targetEntity=Enfermedades::class, mappedBy="categoria")
     */
    private $enfermedades;

    public function __construct()
    {
        $this->hospcats = new ArrayCollection();
        $this->enfermedades = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * @return Collection|Hospcat[]
     */
    public function getHospcats(): Collection
    {
        return $this->hospcats;
    }

    public function addHospcat(Hospcat $hospcat): self
    {
        if (!$this->hospcats->contains($hospcat)) {
            $this->hospcats[] = $hospcat;
            $hospcat->setCategoria($this);
        }

        return $this;
    }

    public function removeHospcat(Hospcat $hospcat): self
    {
        if ($this->hospcats->removeElement($hospcat)) {
            // set the owning side to null (unless already changed)
            if ($hospcat->getCategoria() === $this) {
                $hospcat->setCategoria(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Enfermedades[]
     */
    public function getEnfermedades(): Collection
    {
        return $this->enfermedades;
    }

    public function addEnfermedade(Enfermedades $enfermedade): self
    {
        if (!$this->enfermedades->contains($enfermedade)) {
            $this->enfermedades[] = $enfermedade;
            $enfermedade->setCategoria($this);
        }

        return $this;
    }

    public function removeEnfermedade(Enfermedades $enfermedade): self
    {
        if ($this->enfermedades->removeElement($enfermedade)) {
            // set the owning side to null (unless already changed)
            if ($enfermedade->getCategoria() === $this) {
                $enfermedade->setCategoria(null);
            }
        }

        return $this;
    }
        public function __toString()
    {
        return $this->nombre;
    }
}
