<?php

namespace App\Entity;

use App\Repository\HospcatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HospcatRepository::class)
 */
class Hospcat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Hospitales::class, inversedBy="hospcats")
     */
    private $hospital;

    /**
     * @ORM\ManyToOne(targetEntity=Categorias::class, inversedBy="hospcats")
     */
    private $categoria;

    /**
     * @ORM\Column(type="integer")
     */
    private $Ingresados;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHospital(): ?hospitales
    {
        return $this->hospital;
    }

    public function setHospital(?hospitales $hospital): self
    {
        $this->hospital = $hospital;

        return $this;
    }

    public function getCategoria(): ?categorias
    {
        return $this->categoria;
    }

    public function setCategoria(?categorias $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getIngresados(): ?int
    {
        return $this->Ingresados;
    }

    public function setIngresados(int $Ingresados): self
    {
        $this->Ingresados = $Ingresados;

        return $this;
    }
}
