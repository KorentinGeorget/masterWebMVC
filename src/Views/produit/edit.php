<link rel="stylesheet" href="/css/produit.css">
<link rel="stylesheet" href="/css/button.css">

<h1 class="pageTitle">Modifier le Produit</h1>

<div class="formWrapper">
    <form action="/produit/update/<?= $produit->getId() ?>" method="post">
        <div>
            <label for="type">Type</label>
            <input type="text" name="type" id="type" value="<?= htmlspecialchars($produit->getType()) ?>">
        </div>
        <div>
            <label for="designation">Désignation</label>
            <input type="text" name="designation" id="designation" value="<?= htmlspecialchars($produit->getDesignation()) ?>">
        </div>
        <div>
            <label for="prix_ht">Prix HT</label>
            <input type="number" name="prix_ht" id="prix_ht" step="0.01" value="<?= htmlspecialchars($produit->getPrixHt()) ?>">
        </div>
        <div>
            <label for="reduction_percent">Réduction (en %)</label>
            <input type="number" name="reduction_percent" id="reduction_percent" min="0" max="100" 
                   value="<?= htmlspecialchars($produit->getReductionPercent() ?? 0) ?>">
        </div>
        <div>
            <label for="date_in">Date d'entrée</label>
            <input type="date" name="date_in" id="date_in" value="<?= htmlspecialchars($produit->getDateIn()) ?>">
        </div>
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="<?= htmlspecialchars($produit->getStock()) ?>">
        </div>
        <div>
            <label for="image_filename">Chemin image</label>
            <input type="text" name="image_filename" id="image_filename" value="<?= htmlspecialchars($produit->getImageFilename()) ?>">
        </div>
        <button type="submit" class="btn">Mettre à jour</button>
    </form>
</div>

<div class="pageActions">
    <a href="/produit" class="btn btnSecondary">Retour à la liste</a>
    
    <!-- Je n'ai pas touché à votre formulaire de suppression -->
    <form action="/produit/delete/<?= $produit->getId() ?>" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
        <button type="submit" class="btn btnDanger">Supprimer</button>
    </form>
</div>