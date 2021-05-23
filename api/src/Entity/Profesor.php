<?php

namespace App\Entity;

use App\Repository\ProfesorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfesorRepository::class)
 */
class Profesor
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
    private $papellido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sapellido;

    /**
     * @ORM\OneToMany(targetEntity=Modulo::class, mappedBy="profesor")
     */
    private $modulo;

    public function __construct()
    {
        $this->modulo = new ArrayCollection();
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

    public function getPapellido(): ?string
    {
        return $this->papellido;
    }

    public function setPapellido(string $papellido): self
    {
        $this->papellido = $papellido;

        return $this;
    }

    public function getSapellido(): ?string
    {
        return $this->sapellido;
    }

    public function setSapellido(string $sapellido): self
    {
        $this->sapellido = $sapellido;

        return $this;
    }

    /**
     * @return Collection|Modulo[]
     */
    public function getModulo(): Collection
    {
        return $this->modulo;
    }

    public function addModulo(Modulo $modulo): self
    {
        if (!$this->modulo->contains($modulo)) {
            $this->modulo[] = $modulo;
            $modulo->setProfesor($this);
        }

        return $this;
    }

    public function removeModulo(Modulo $modulo): self
    {
        if ($this->modulo->removeElement($modulo)) {
            // set the owning side to null (unless already changed)
            if ($modulo->getProfesor() === $this) {
                $modulo->setProfesor(null);
            }
        }

        return $this;
    }

}
