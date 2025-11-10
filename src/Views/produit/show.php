<link rel="stylesheet" href="/css/produit.css">
<link rel="stylesheet" href="/css/button.css">

<h1 class="pageTitle">Détails du Produit #<?= htmlspecialchars($produit->getId()) ?></h1>

<div class="showImageContainer" style="text-align: center; margin: 2rem 0;">
    <?php 
    $imgFile = $produit ? $produit->getImageFileName() : null; 
    ?>
    <?php if (!empty($imgFile)): ?>
        <img src="/Images/<?= htmlspecialchars($imgFile) ?>" 
             alt="<?= htmlspecialchars($produit->getDesignation()) ?>" 
             style="max-width: 100%; max-height: 400px; border-radius: 8px; border: 1px solid #ddd; object-fit: cover;">
    <?php else: ?>
        <div style="width: 100%; max-width: 400px; height: 300px; border: 2px dashed #ccc; 
                    display: grid; place-items: center; color: #999; margin: 0 auto; border-radius: 8px;">
            Pas d'image fournie
        </div>
    <?php endif; ?>
</div>
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
        <div class="detailLabel">Prix</div>
        <div class="detailValue">
            <?php 
            $prixOriginal = $produit->getPrixHt();
            $prixReduit = $produit->getPrixReduit();
            ?>
            
            <?php if ($prixReduit < $prixOriginal): ?>

                <span style="text-decoration: line-through; color: #999; font-size: 1em;">
                    <?= htmlspecialchars(number_format($prixOriginal, 2)) ?> €
                </span>
                <strong style="color: red; font-size: 1.2em; margin-left: 10px;">
                    <?= htmlspecialchars(number_format($prixReduit, 2)) ?> €
                </strong>
                 <small style="display: block; color: red; margin-top: 5px;">
                    (Réduction de <?= htmlspecialchars($produit->getReductionPercent()) ?>% appliquée)
                </small>
            <?php else:  ?>
                <span style="font-size: 1.2em; font-weight: bold;">
                    <?= htmlspecialchars(number_format($prixOriginal, 2)) ?> €
                </span>
            <?php endif; ?>
        </div>
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
    <div class="detailRow">
        <div class="detailLabel">Nom Fichier Image</div>
        <div class="detailValue"><?= htmlspecialchars($produit->getImageFileName() ?? 'N/A') ?></div>
    </div>
    <div class="detailRow">
        <div class="detailLabel">Réduction appliquée</div>
        <div class="detailValue"><?= htmlspecialchars($produit->getReductionPercent() ?? 0) ?>%</div>
    </div>

</div>

<!-- ==================================
     BLOC HISTORIQUE AJOUTÉ
=====================================-->
<?php 

if (!empty($historique)): 
?>
<div class="historySection" style="margin-top: 3rem;">
    
    <h2 class="pageTitle" style="font-size: 1.5rem; text-align: left; border-bottom: 2px solid #eee; padding-bottom: 10px;">
        Historique des réductions
    </h2>
    
    <table class="crudTable" style="margin-top: 1rem;">
        <thead>
            <tr>
                <th>Date de modification</th>
                <th>Ancienne Réduction</th>
                <th>Nouvelle Réduction</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historique as $entree): ?>
                <tr>
                    <td><?= htmlspecialchars($entree->getDateModification()) ?></td>
                    <td style="color: #999;"><?= htmlspecialchars($entree->getAncienneValeur()) ?>%</td>
                    <td style="color: red; font-weight: bold;"><?= htmlspecialchars($entree->getNouvelleValeur()) ?>%</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php endif; ?>



<div class="pageActions" style="margin-top: 2rem;">
    <a href="/produit" class="btn btnSecondary">Retour à la liste</a>
    
    <?php if (($admin)): ?>
        <a href="/produit/edit/<?= $produit->getId() ?>" class="btn">Modifier</a>
    <?php endif; ?>
</div>