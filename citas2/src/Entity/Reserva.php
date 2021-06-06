<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use App\Validator\Constraints as MyAssert;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservaRepository")
 * @ORM\Table(name="citas_reservas")
 */
class Reserva
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
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
    private $nif;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @MyAssert\TelefonoMovil
     */
    private $telefono;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Cita", inversedBy="reserva" )
     * @ORM\JoinColumn(nullable=false)
     */
    private $cita;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNif(string $nif): self
    {
        $this->nif = $nif;

        return $this;
    
    }

    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

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

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getCita(): ?Cita
    {
        return $this->cita;
    }

    public function setCita(Cita $cita): self
    {
        $this->cita = $cita;

        return $this;
    }


}
