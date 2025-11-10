<?php

namespace App\Repositories;

use App\Core\Database;
use App\Entities\HistoriqueReduction;

class HistoriqueReductionRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function create(int $produitId, int $ancienneValeur, int $nouvelleValeur): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO historique_reduction (produit_id, ancienne_valeur, nouvelle_valeur) 
             VALUES (:produit_id, :ancienne_valeur, :nouvelle_valeur)'
        );
        
        $stmt->execute([
            'produit_id' => $produitId,
            'ancienne_valeur' => $ancienneValeur,
            'nouvelle_valeur' => $nouvelleValeur,
        ]);
    }

    public function findByProduitId(int $produitId): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM historique_reduction WHERE produit_id = :produit_id ORDER BY date_modification DESC');
        $stmt->execute(['produit_id' => $produitId]);
        
        return $stmt->fetchAll(\PDO::FETCH_CLASS, HistoriqueReduction::class);
    }
}