<link rel="stylesheet" href="/css/produit.css">
<link rel="stylesheet" href="/css/button.css">

<div class="pageHeader">
    <h1 class="pageTitle">Liste des Produits</h1>
    
    <?php if (($admin)): ?>
        <div class="pageActions">
            <a href="/produit/new" class="btn">Créer un nouveau produit</a>
        </div>
    <?php endif; ?>

</div>

<table class="crudTable">
    <thead>
        <tr>
            <th>Id</th>
            <th>Type</th>
            <th>Designation</th>
            <th>Prix Ht</th>
            <th>Prix Réduit</th> <!-- <-- COLONNE AJOUTÉE -->
            <th>Date In</th>
            <th>Stock</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($produits as $produit): ?>
        <tr>
            <td><?= htmlspecialchars($produit->getId()) ?></td>
            <td><?= htmlspecialchars($produit->getType()) ?></td>
            <td><?= htmlspecialchars($produit->getDesignation()) ?></td>
            
            <!-- Cellule PRIX HT (Original) -->
            <td>
                <?php 
                // On récupère les deux prix pour les comparer
                $prixOriginal = $produit->getPrixHt();
                $prixReduit = $produit->getPrixReduit();
                
                // Si une réduction est active, on barre le prix original
                if ($prixReduit < $prixOriginal): 
                ?>
                    <span style="text-decoration: line-through; color: #999;">
                        <?= htmlspecialchars(number_format($prixOriginal, 2)) ?> €
                    </span>
                <?php else: // Sinon, on affiche le prix normal ?>
                    <?= htmlspecialchars(number_format($prixOriginal, 2)) ?> €
                <?php endif; ?>
            </td>
            
            <td style="font-weight: bold; color: <?= ($prixReduit < $prixOriginal) ? 'red' : 'inherit' ?>;">
                <?php 
                if ($prixReduit < $prixOriginal): 
                ?>
                    <?= htmlspecialchars(number_format($prixReduit, 2)) ?> €
                <?php else: ?>
                    - <!-- S'il n'y a pas de réduction, on affiche un tiret -->
                <?php endif; ?>
            </td>

            <td><?= htmlspecialchars($produit->getDateIn()) ?></td>
            <td><?= htmlspecialchars($produit->getStock()) ?></td>

            <td style="text-align: center;">
                <?php 
                $imgFile = $produit->getImageFilename(); 
                ?>
                
                <?php if (!empty($imgFile)): ?>
                    <img src="/Images/<?= htmlspecialchars($imgFile) ?>" 
                         alt="<?= htmlspecialchars($produit->getDesignation()) ?>" 
                         style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
                <?php else: ?>
                    <span style="color: #999; font-style: italic; font-size: 0.9em;">Pas d'image</span>
                <?php endif; ?>
            </td>

            <td class="actionsCell">
                <a href="/produit/show/<?= $produit->getId() ?>" class="btn btnSmall">Voir</a>
                
                <!-- Je garde votre code "if ($admin)" intact -->
                <?php if ($admin): ?>
                    <a href="/produit/edit/<?= $produit->getId() ?>" class="btn btnSmall btnSecondary">Modifier</a>
                <?php endif; ?>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>