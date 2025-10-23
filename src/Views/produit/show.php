<link rel="stylesheet" href="/css/produit.css">
<link rel="stylesheet" href="/css/button.css">

<h1 class="pageTitle">Détails du Produit #<?= htmlspecialchars($produit['id']) ?></h1>

<div class="showDetails">
    <div class="detailRow">
        <div class="detailLabel">Type</div>
        <div class="detailValue"><?= htmlspecialchars($produit['type']) ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Désignation</div>
        <div class="detailValue"><?= htmlspecialchars($produit['designation']) ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Prix HT</div>
        <div class="detailValue"><?= htmlspecialchars($produit['prix_ht']) ?> €</div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Date d'entrée</div>
        <div class="detailValue"><?= htmlspecialchars($produit['date_in']) ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Date de création</div>
        <div class="detailValue"><?= htmlspecialchars($produit['time_sin']) ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Stock</div>
        <div class="detailValue"><?= htmlspecialchars($produit['stock']) ?></div>
    </div>
</div>

<div class="pageActions">
    <a href="/produit" class="btn btnSecondary">Retour à la liste</a>
    <a href="/produit/edit/<?= $produit['id'] ?>" class="btn">Modifier</a>
</div>
