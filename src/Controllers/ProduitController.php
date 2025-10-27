<?php

namespace App\Controllers;

use App\Repositories\ProduitRepository;
use App\Entities\Produit;

class ProduitController extends Controller
{
    private $produitRepository;

    public function __construct()
    {
        $this->produitRepository = new ProduitRepository();
    }

    public function index()
    {
        $produits = $this->produitRepository->findAll();
        $this->render('produit/index', ['produits' => $produits]);
    }

    public function show($id)
    {
        $produit = $this->produitRepository->findById($id);
        $this->render('produit/show', ['produit' => $produit]);
    }

    public function new()
    {
        $this->render('produit/new');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produit = new Produit();
            $produit->setType($_POST['type']);
            $produit->setDesignation($_POST['designation']);
            $produit->setPrixHt($_POST['prix_ht']);
            $produit->setDateIn($_POST['date_in']);
            $produit->setStock($_POST['stock']);
            
            $this->produitRepository->create($produit);
            header('Location: /produit');
        }
    }

    public function edit($id)
    {
        $produit = $this->produitRepository->findById($id);
        $this->render('produit/edit', ['produit' => $produit]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produit = $this->produitRepository->findById($id);
            $produit->setType($_POST['type']);
            $produit->setDesignation($_POST['designation']);
            $produit->setPrixHt($_POST['prix_ht']);
            $produit->setDateIn($_POST['date_in']);
            $produit->setStock($_POST['stock']);

            $this->produitRepository->update($produit);
            header('Location: /produit');
        }
    }

    public function delete($id)
    {
        $this->produitRepository->delete($id);
        header('Location: /produit');
    }
}
