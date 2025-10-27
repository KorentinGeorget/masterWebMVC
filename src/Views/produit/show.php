<link rel="stylesheet" href="/css/produit.css">
<link rel="stylesheet" href="/css/button.css">

<h1 class="pageTitle">Détails du Produit #<?= htmlspecialchars($produit->getId()) ?></h1>

<div class="showDetails">
    <div class="detailRow">
        <div class="detailLabel">Type</div>
        <div class="detailValue"><?= htmlspecialchars($produit->getType()) ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Désignation</div>
        <div class="detailValue"><?= htmlspecialchars($produit->getDesignation()) ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Prix HT</div>
        <div class="detailValue"><?= htmlspecialchars($produit->getPrixHt()) ?> €</div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Date d'entrée</div>
        <div class="detailValue"><?= htmlspecialchars($produit->getDateIn()) ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Date de création</div>
        <div class="detailValue"><?= htmlspecialchars($produit->getTimeSin()) ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Stock</div>
        <div class="detailValue"><?= htmlspecialchars($produit->getStock()) ?></div>
    </div>
</div>

<div class="pageActions">
    <a href="/produit" class="btn btnSecondary">Retour à la liste</a>
    <a href="/produit/edit/<?= $produit->getId() ?>" class="btn">Modifier</a>
</div>
