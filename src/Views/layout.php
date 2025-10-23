<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GestionStock</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/header.css">
</head>
<body>
    <header class="mainHeader">
        <div class="headerContainer">
            <a href="/" class="headerLogo">GestionStock</a>
            <nav class="mainNav">
                <ul>
                    <li><a href="/produit" class="navLink">Produits</a></li>
                    <li><a href="/user" class="navLink">Utilisateurs</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="pageContainer">
        <?= $content ?>
    </main>

</body>
</html>
