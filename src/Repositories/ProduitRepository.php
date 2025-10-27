<?php

namespace App\Repositories;

use App\Entities\Produit;
use App\Core\Database;

class ProduitRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    private function hydrate(array $data): Produit
    {
        $produit = new Produit();
        $produit->setId($data['id']);
        $produit->setType($data['type']);
        $produit->setDesignation($data['designation']);
        $produit->setPrixHt($data['prix_ht']);
        $produit->setDateIn($data['date_in']);
        $produit->setTimeSin($data['time_sin']);
        $produit->setStock($data['stock']);
        return $produit;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM produit');
        $produitsData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $produits = [];
        foreach ($produitsData as $produitData) {
            $produits[] = $this->hydrate($produitData);
        }
        return $produits;
    }

    public function findById($id): ?Produit
    {
        $stmt = $this->pdo->prepare('SELECT * FROM produit WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data ? $this->hydrate($data) : null;
    }

    public function create(Produit $produit): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO produit (type, designation, prix_ht, date_in, stock, time_sin) 
             VALUES (:type, :designation, :prix_ht, :date_in, :stock, NOW())'
        );
        $stmt->execute([
            'type' => $produit->getType(),
            'designation' => $produit->getDesignation(),
            'prix_ht' => $produit->getPrixHt(),
            'date_in' => $produit->getDateIn(),
            'stock' => $produit->getStock(),
        ]);
    }

    public function update(Produit $produit): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE produit 
             SET type = :type, designation = :designation, prix_ht = :prix_ht, date_in = :date_in, stock = :stock 
             WHERE id = :id'
        );
        $stmt->execute([
            'id' => $produit->getId(),
            'type' => $produit->getType(),
            'designation' => $produit->getDesignation(),
            'prix_ht' => $produit->getPrixHt(),
            'date_in' => $produit->getDateIn(),
            'stock' => $produit->getStock(),
        ]);
    }

    public function delete($id): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM produit WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
