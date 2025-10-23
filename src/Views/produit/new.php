<link rel="stylesheet" href="/css/produit.css">
<link rel="stylesheet" href="/css/button.css">

<h1 class="pageTitle">Créer un nouveau produit</h1>

<div class="formWrapper">
    <form action="/produit/create" method="post">
        <div>
            <label for="type">Type</label>
            <input type="text" name="type" id="type">
        </div>
        <div>
            <label for="designation">Désignation</label>
            <input type="text" name="designation" id="designation">
        </div>
        <div>
            <label for="prix_ht">Prix HT</label>
            <input type="number" name="prix_ht" id="prix_ht" step="0.01">
        </div>
        <div>
            <label for="date_in">Date d'entrée</label>
            <input type="date" name="date_in" id="date_in">
        </div>
        <div>
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock">
        </div>
        <button type="submit" class="btn">Enregistrer</button>
    </form>
</div>

<div class="pageActions">
    <a href="/produit" class="btn btnSecondary">Retour à la liste</a>
</div>
