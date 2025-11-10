<?php

namespace App\Controllers;

use App\Repositories\ProduitRepository;
use App\Entities\Produit;
use App\Core\AuthService; 
use App\Repositories\HistoriqueReductionRepository;

class ProduitController extends Controller
{
    private $produitRepository;
    private $historiqueRepository;

    public function __construct()
    {
        $this->produitRepository = new ProduitRepository();
        $this->historiqueRepository = new HistoriqueReductionRepository();

    }

    public function index()
    {
        AuthService::requireLogin(); 

        $isAdmin = AuthService::isAdmin();
        $produits = $this->produitRepository->findAll();
        $this->render('produit/index', ['produits' => $produits, 'admin' => $isAdmin]);
    }

    public function show($id)
    {
        AuthService::requireLogin(); 
        $produit = $this->produitRepository->findById($id);
        
        $historique = $this->historiqueRepository->findByProduitId($id);
        
        $isAdmin = AuthService::isAdmin();

        $this->render('produit/show', [
            'produit' => $produit, 
            'admin' => $isAdmin,
            'historique' => $historique 
        ]);
    }

    public function new()
    {
        AuthService::requireAdmin(); 
        $this->render('produit/new');
    }

    public function create()
    {
        AuthService::requireAdmin(); 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produit = new Produit();
            $produit->setType($_POST['type']);
            $produit->setDesignation($_POST['designation']);
            $produit->setPrixHt($_POST['prix_ht']);
            $produit->setDateIn($_POST['date_in']);
            $produit->setStock($_POST['stock']);
            $produit->setImageFilename($_POST['image_filename']);
            $produit->setReductionPercent((int)$_POST['reduction_percent']);
            
            $this->produitRepository->create($produit);

            header('Location: /produit');
        }
    }

    public function edit($id)
    {
        AuthService::requireAdmin(); 
        $produit = $this->produitRepository->findById($id);
        $this->render('produit/edit', ['produit' => $produit]);
    }

    public function update($id)
    {
        AuthService::requireAdmin(); 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $produit = $this->produitRepository->findById($id);
            
            $ancienneReduction = $produit->getReductionPercent();
            $nouvelleReduction = (int)$_POST['reduction_percent'];

            if ($ancienneReduction !== $nouvelleReduction) {
                
                $this->historiqueRepository->create(
                    $produit->getId(),
                    $ancienneReduction,
                    $nouvelleReduction
                );
            }

            $produit->setType($_POST['type']);
            $produit->setDesignation($_POST['designation']);
            $produit->setPrixHt($_POST['prix_ht']);
            $produit->setDateIn($_POST['date_in']);
            $produit->setStock($_POST['stock']);
            $produit->setImageFilename($_POST['image_filename']);
            $produit->setReductionPercent($nouvelleReduction);

            $this->produitRepository->update($produit);
            header('Location: /produit');
        }
    }

    public function delete($id)
    {
        AuthService::requireAdmin();
        $this->produitRepository->delete($id);
        header('Location: /produit');
    }
}