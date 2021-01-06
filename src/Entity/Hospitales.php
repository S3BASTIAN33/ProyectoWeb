<?php

namespace App\Entity;

use App\Repository\HospitalesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=HospitalesRepository::class)
 */
class Hospitales
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
     * @ORM\Column(type="integer")
     * *@Assert\Range(
     *      min = 111111111,
     *      max = 999999999,
     *      notInRangeMessage = "Ingresa numero válido",
     * )
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=255)
     *  
     * @Assert\Email(
     *     message = "El mail '{{ value }}' no es valido."
     * )
     */
     
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $direccion;

    /**
     * @ORM\OneToMany(targetEntity=Hospcat::class, mappedBy="hospital")
     */
    private $hospcats;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $Ubicacion;

    public function __construct()
    {
        $this->hospcats = new ArrayCollection();
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

    public function getTelefono(): ?int
    {
        return $this->telefono;
    }

    public function setTelefono(int $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

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

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): self
    {
        $this->direccion = $direccion;

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
            $hospcat->setHospital($this);
        }

        return $this;
    }

    public function removeHospcat(Hospcat $hospcat): self
    {
        if ($this->hospcats->removeElement($hospcat)) {
            // set the owning side to null (unless already changed)
            if ($hospcat->getHospital() === $this) {
                $hospcat->setHospital(null);
            }
        }

        return $this;
    }
        public function __toString()
    {
        return $this->nombre;
    }

        public function getUbicacion(): ?string
        {
            return $this->Ubicacion;
        }

        public function setUbicacion(string $Ubicacion): self
        {
            $this->Ubicacion = $Ubicacion;

            return $this;
        }
}
