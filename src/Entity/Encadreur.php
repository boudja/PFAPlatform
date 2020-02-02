<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EncadreurRepository")
 */
class Encadreur
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
    private $nom_encadrant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom_encadrant;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEncadrant(): ?string
    {
        return $this->nom_encadrant;
    }

    public function setNomEncadrant(string $nom_encadrant): self
    {
        $this->nom_encadrant = $nom_encadrant;

        return $this;
    }

    public function getPrenomEncadrant(): ?string
    {
        return $this->prenom_encadrant;
    }

    public function setPrenomEncadrant(string $prenom_encadrant): self
    {
        $this->prenom_encadrant = $prenom_encadrant;

        return $this;
    }
}
