<?php

namespace App\Controllers;

use App\Models\ProduitModel;

class ProduitController extends Controller
{
    public function index()
    {
        $produitModel = new ProduitModel();
        $produits = $produitModel->findAll();
        $this->render('produit/index', ['produits' => $produits]);
    }

    public function show($id)
    {
        $produitModel = new ProduitModel();
        $produit = $produitModel->findById($id);
        $this->render('produit/show', ['produit' => $produit]);
    }

    public function new()
    {
        $this->render('produit/new');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produitModel = new ProduitModel();
            $produitModel->create($_POST);
            header('Location: /produit');
        }
    }

    public function edit($id)
    {
        $produitModel = new ProduitModel();
        $produit = $produitModel->findById($id);
        $this->render('produit/edit', ['produit' => $produit]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $produitModel = new ProduitModel();
            $produitModel->update($id, $_POST);
            header('Location: /produit');
        }
    }

    public function delete($id)
    {
        $produitModel = new ProduitModel();
        $produitModel->delete($id);
        header('Location: /produit');
    }
}
