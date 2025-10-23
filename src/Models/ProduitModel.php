<?php

namespace App\Models;

class ProduitModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function findAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM produit');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM produit WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO produit (type, designation, prix_ht, date_in, stock, time_sin) 
             VALUES (:type, :designation, :prix_ht, :date_in, :stock, NOW())'
        );
        $stmt->execute([
            'type' => $data['type'],
            'designation' => $data['designation'],
            'prix_ht' => $data['prix_ht'],
            'date_in' => $data['date_in'],
            'stock' => $data['stock'],
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare(
            'UPDATE produit 
             SET type = :type, designation = :designation, prix_ht = :prix_ht, date_in = :date_in, stock = :stock 
             WHERE id = :id'
        );
        $stmt->execute([
            'id' => $id,
            'type' => $data['type'],
            'designation' => $data['designation'],
            'prix_ht' => $data['prix_ht'],
            'date_in' => $data['date_in'],
            'stock' => $data['stock'],
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM produit WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
