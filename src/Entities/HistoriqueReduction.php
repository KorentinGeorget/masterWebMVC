<?php

namespace App\Entities;

class HistoriqueReduction
{
    private $id;
    private $produit_id;
    private $ancienne_valeur;
    private $nouvelle_valeur;
    private $date_modification;

 
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduitId(): ?int
    {
        return $this->produit_id;
    }


    public function getAncienneValeur(): int
    {
        return $this->ancienne_valeur;
    }

    public function getNouvelleValeur(): int
    {
        return $this->nouvelle_valeur;
    }

    public function getDateModification(): ?string
    {
        return $this->date_modification;
    }


    public function setProduitId(int $produit_id): void
    {
        $this->produit_id = $produit_id;
    }

    public function setAncienneValeur(int $ancienne_valeur): void
    {
        $this->ancienne_valeur = $ancienne_valeur;
    }

    public function setNouvelleValeur(int $nouvelle_valeur): void
    {
        $this->nouvelle_valeur = $nouvelle_valeur;
    }
}