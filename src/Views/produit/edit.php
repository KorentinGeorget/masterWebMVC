<link rel="stylesheet" href="/css/produit.css">
<link rel="stylesheet" href="/css/button.css">

<h1 class="pageTitle">Modifier le Produit</h1>

<div class="formWrapper">
    <form action="/produit/update/<?= $produit['id'] ?>" method="post">
        <div>
            <label for="type">Type</label>
            <input type="text" name="type" id="type" value="<?= htmlspecialchars($produit['type']) ?>">
        </div>
        <div>
            <label for="designation">Désignation</label>
            <input type="text" name="designation" id="designation" value="<?= htmlspecialchars($produit['designation']) ?>">
        </div>
        <div>
            <label for="prix_ht">Prix HT</label>
            <input type="number" name="prix_ht" id="prix_ht" step="0.01" value="<?= htmlspecialchars($produit['prix_ht']) ?>">
        </div>
        <div>
            <label for="date_in">Date d'entrée</label>
            <input type="date" name="date_in" id="date_in" value="<?= htmlspecialchars($produit['date_in']) ?>">
        </div>
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="<?= htmlspecialchars($produit['stock']) ?>">
        </div>
        <button type="submit" class="btn">Mettre à jour</button>
    </form>
</div>

<div class="pageActions">
    <a href="/produit" class="btn btnSecondary">Retour à la liste</a>
    <form action="/produit/delete/<?= $produit['id'] ?>" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet élément ?');">
        <button type="submit" class="btn btnDanger">Supprimer</button>
    </form>
</div>
