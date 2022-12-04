<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\ApiFilter;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Doctrine\Orm\Filter\SearchFilter;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
#[ApiResource, ApiFilter(SearchFilter::class, properties:['statut'=>'exact'])]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $civ = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $codePostal = null;

    #[ORM\Column(length: 255)]
    //Condition Regex pour avoir le numero sous format 10 digit
    #[Assert\Regex('#^0[1-79]([0-9]){8}$#')]

    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $modele = null;

    #[ORM\Column(length: 255)]
    private ?string $idContact = null;

    #[ORM\Column(length: 255)]
    private ?string $campagne = null;

    #[ORM\Column(length: 255)]
    private ?string $echeanceProjet = null;

    #[ORM\Column(length: 255)]
    private ?string $statut = null;

    #[ORM\Column(length: 255)]
    private ?string $codeConcession = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCiv(): ?string
    {
        return $this->civ;
    }

    public function setCiv(string $civ): self
    {
        $this->civ = $civ;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

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

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): self
    {
        $this->modele = $modele;

        return $this;
    }

    public function getIdContact(): ?string
    {
        return $this->idContact;
    }

    public function setIdContact(string $idContact): self
    {
        $this->idContact = $idContact;

        return $this;
    }

    public function getCampagne(): ?string
    {
        return $this->campagne;
    }

    public function setCampagne(string $campagne): self
    {
        $this->campagne = $campagne;

        return $this;
    }

    public function getEcheanceProjet(): ?string
    {
        return $this->echeanceProjet;
    }

    public function setEcheanceProjet(string $echeanceProjet): self
    {
        $this->echeanceProjet = $echeanceProjet;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getCodeConcession(): ?string
    {
        return $this->codeConcession;
    }

    public function setCodeConcession(string $codeConcession): self
    {
        $this->codeConcession = $codeConcession;

        return $this;
    }
}
