# Projet PHP MVC Simple

Ce projet est une application web simple développée en PHP de base, sans l'utilisation de frameworks. Il a pour but de démontrer une implémentation de l'architecture Modèle-Vue-Contrôleur (MVC).

## L'architecture MVC

L'architecture MVC (Modèle-Vue-Contrôleur) est un patron de conception qui vise à séparer les préoccupations dans une application. Voici comment elle est structurée dans ce projet :

### Modèle (Model)

Le **Modèle** représente la logique métier et les données de l'application. Il est responsable de l'interaction avec la base de données.

-   **Emplacement :** `src/Models/`
-   **Rôle :** Dans ce projet, les modèles (`UserModel.php`, `ProduitModel.php`) contiennent les requêtes SQL pour lire et écrire des données dans la base de données. La classe `Database.php` gère la connexion à la base de données.

### Vue (View)

La **Vue** est responsable de la présentation des données à l'utilisateur. Elle contient le code HTML et CSS.

-   **Emplacement :** `src/Views/`
-   **Rôle :** Les vues sont des fichiers PHP simples qui affichent les données préparées par le contrôleur. Le fichier `layout.php` sert de gabarit principal pour les pages.

### Contrôleur (Controller)

Le **Contrôleur** fait le lien entre le Modèle et la Vue. Il reçoit les requêtes de l'utilisateur, interagit avec le Modèle pour récupérer des données, et passe ces données à la Vue pour l'affichage.

-   **Emplacement :** `src/Controllers/`
-   **Rôle :** Les contrôleurs (`HomeController.php`, `ProduitController.php`, `UserController.php`) contiennent la logique de l'application. Chaque méthode publique d'un contrôleur correspond à une "action" ou une page de l'application.

## Structure du projet

```
.
├── config/
│   └── config.php        # Configuration de la base de données
├── public/
│   ├── .router.php       # Routeur pour le serveur de développement PHP
│   ├── css/              # Fichiers CSS
│   └── index.php         # Point d'entrée de l'application (routeur principal)
├── src/
│   ├── Controllers/      # Contrôleurs
│   ├── Models/           # Modèles
│   └── Views/            # Vues
├── vendor/               # Dépendances (géré par Composer)
├── composer.json         # Fichier de configuration de Composer
└── database.sql          # Structure de la base de données
```

## Installation et Lancement

1.  **Base de données :**
    -   Assurez-vous d'avoir un serveur MySQL en cours d'exécution.
    -   Créez une base de données (par exemple, `app`).
    -   Importez le fichier `database.sql` dans votre base de données.
    -   Modifiez le fichier `config/config.php` avec vos informations de connexion à la base de données si nécessaire.

2.  **Dépendances :**
    -   Si vous n'avez pas Composer, installez-le.
    -   Exécutez `composer install` à la racine du projet pour générer l'autoloader.

3.  **Lancement du serveur :**
    -   Placez-vous à la racine du projet.
    -   Exécutez la commande suivante :
        ```bash
        php -S localhost:8000 -t public public/.router.php
        ```
    -   L'application sera accessible à l'adresse `http://localhost:8000`.
