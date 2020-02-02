<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProjectRepository")
 */
class Project
{
    public function __construct()
    {
        $this->etat = "disponible";
    }
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom_projet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_encadrant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $outlis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mots_cle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pdf;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etat;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\user", mappedBy="project")
     */
    private $id_user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProjet(): ?string
    {
        return $this->Nom_projet;
    }

    public function setNomProjet(string $Nom_projet): self
    {
        $this->Nom_projet = $Nom_projet;

        return $this;
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

    public function getOutlis(): ?string
    {
        return $this->outlis;
    }

    public function setOutlis(string $outlis): self
    {
        $this->outlis = $outlis;

        return $this;
    }

    public function getMotsCle(): ?string
    {
        return $this->mots_cle;
    }

    public function setMotsCle(string $mots_cle): self
    {
        $this->mots_cle = $mots_cle;

        return $this;
    }

    public function getPdf(): ?string
    {
        return $this->pdf;
    }

    public function setPdf(string $pdf): self
    {
        $this->pdf = $pdf;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

}
