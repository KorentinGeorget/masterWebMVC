<link rel="stylesheet" href="/css/produit.css">
<link rel="stylesheet" href="/css/button.css">

<div class="pageHeader">
    <h1 class="pageTitle">Liste des Produits</h1>
    <div class="pageActions">
        <a href="/produit/new" class="btn">Créer un nouveau produit</a>
    </div>
</div>

<table class="crudTable">
    <thead>
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Designation</th>
            <th>Prix Ht</th>
            <th>Date In</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($produits as $produit): ?>
        <tr>
            <td><?= htmlspecialchars($produit->getId()) ?></td>
            <td><?= htmlspecialchars($produit->getType()) ?></td>
            <td><?= htmlspecialchars($produit->getDesignation()) ?></td>
            <td><?= htmlspecialchars($produit->getPrixHt()) ?> €</td>
            <td><?= htmlspecialchars($produit->getDateIn()) ?></td>
            <td><?= htmlspecialchars($produit->getStock()) ?></td>
            <td class="actionsCell">
                <a href="/produit/show/<?= $produit->getId() ?>" class="btn btnSmall">Voir</a>
                <a href="/produit/edit/<?= $produit->getId() ?>" class="btn btnSmall btnSecondary">Modifier</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
