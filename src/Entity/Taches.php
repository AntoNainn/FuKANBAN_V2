<?php

namespace App\Entity;

use App\Repository\TachesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TachesRepository::class)]
class Taches
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Titre = null;

    #[ORM\Column(length: 255)]
    private ?string $Description = null;

    #[ORM\ManyToOne(inversedBy: 'taches')]
    private ?Statut $IdStatut = null;

    #[ORM\ManyToOne(inversedBy: 'taches')]
    private ?Projets $IdProjet = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateCreation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateEcheance = null;

    #[ORM\ManyToOne(inversedBy: 'taches')]
    private ?Utilisateurs $IdUtilisateur = null;

    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->Titre;
    }

    public function setTitre(string $Titre): static
    {
        $this->Titre = $Titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getIdStatut(): ?Statut
    {
        return $this->IdStatut;
    }

    public function setIdStatut(?Statut $IdStatut): static
    {
        $this->IdStatut = $IdStatut;

        return $this;
    }

    public function getIdProjet(): ?Projets
    {
        return $this->IdProjet;
    }

    public function setIdProjet(?Projets $IdProjet): static
    {
        $this->IdProjet = $IdProjet;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeInterface $DateCreation): static
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    public function getDateEcheance(): ?\DateTimeInterface
    {
        return $this->DateEcheance;
    }

    public function setDateEcheance(\DateTimeInterface $DateEcheance): static
    {
        $this->DateEcheance = $DateEcheance;

        return $this;
    }

    public function getIdUtilisateur(): ?Utilisateurs
    {
        return $this->IdUtilisateur;
    }

    public function setIdUtilisateur(?Utilisateurs $IdUtilisateur): static
    {
        $this->IdUtilisateur = $IdUtilisateur;

        return $this;
    }

    public function __toString(){
        return $this->Titre;
    }
}
