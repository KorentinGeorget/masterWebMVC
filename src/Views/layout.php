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
                    <?php if (\App\Core\AuthService::isLoggedIn()): ?>

                        <li><a href="/produit" class="navLink">Produits</a></li>

                        <?php if (\App\Core\AuthService::isAdmin()): ?>

                            <li><a href="/user" class="navLink">Utilisateurs</a></li>
                        <?php endif; ?>

                        <li><a href="/logout" class="navLink">Se déconnecter</a></li>

                    <?php else: ?>
                        <li><a href="/login" class="navLink">Se connecter</a></li>
                        <li><a href="/register" class="navLink">S'inscrire</a></li>

                    <?php endif; ?>
                    
                </ul>
            </nav>
        </div>
    </header>

    <main class="pageContainer">
        <?= $content ?>
    </main>

</body>
</html>
