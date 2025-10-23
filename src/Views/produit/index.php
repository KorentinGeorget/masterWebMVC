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
            <td><?= htmlspecialchars($produit['id']) ?></td>
            <td><?= htmlspecialchars($produit['type']) ?></td>
            <td><?= htmlspecialchars($produit['designation']) ?></td>
            <td><?= htmlspecialchars($produit['prix_ht']) ?> €</td>
            <td><?= htmlspecialchars($produit['date_in']) ?></td>
            <td><?= htmlspecialchars($produit['stock']) ?></td>
            <td class="actionsCell">
                <a href="/produit/show/<?= $produit['id'] ?>" class="btn btnSmall">Voir</a>
                <a href="/produit/edit/<?= $produit['id'] ?>" class="btn btnSmall btnSecondary">Modifier</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
