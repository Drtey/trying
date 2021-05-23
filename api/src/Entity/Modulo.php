<?php

namespace App\Entity;

use App\Repository\ModuloRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @ORM\Entity(repositoryClass=ModuloRepository::class)
 */
class Modulo
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
    private $Codigo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Curso;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Horas;

    /**
     * @ORM\ManyToOne(targetEntity=Profesor::class, inversedBy="modulo")
     */
    private $profesor;

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

    public function getCodigo(): ?string
    {
        return $this->Codigo;
    }

    public function setCodigo(string $Codigo): self
    {
        $this->Codigo = $Codigo;

        return $this;
    }

    public function getCurso(): ?string
    {
        return $this->Curso;
    }

    public function setCurso(string $Curso): self
    {
        $this->Curso = $Curso;

        return $this;
    }

    public function getHoras(): ?string
    {
        return $this->Horas;
    }

    public function setHoras(string $Horas): self
    {
        $this->Horas = $Horas;

        return $this;
    }

    public function getProfesor(): ?Profesor
    {
        return $this->profesor;
    }

    public function setProfesor(?Profesor $profesor): self
    {
        $this->profesor = $profesor;

        return $this;
    }

}
