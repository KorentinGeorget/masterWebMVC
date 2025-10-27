# Projet PHP MVC Simple

Ce projet est une application web simple développée en PHP de base, sans l'utilisation de frameworks. Il a pour but de démontrer une implémentation de l'architecture Modèle-Vue-Contrôleur (MVC).

## L'architecture MVC

L'architecture MVC (Modèle-Vue-Contrôleur) est un patron de conception qui vise à séparer les préoccupations dans une application. Voici comment elle est structurée dans ce projet :

### Modèle (Model)

Le **Modèle** représente la logique métier et les données de l'application. Dans cette architecture, il est composé de plusieurs éléments :

-   **Entités :** Représentent les objets métier de l'application (ex: un `Produit`, un `User`). Elles contiennent les propriétés des objets et peuvent inclure de la logique métier spécifique à un objet.
    -   **Emplacement :** `src/Entities/`
-   **Repositories :** Servent de pont entre les contrôleurs et la base de données. Leur rôle est de gérer la persistance (recherche, sauvegarde, suppression) des entités. Ils retournent des objets (entités) plutôt que de simples tableaux.
    -   **Emplacement :** `src/Repositories/`
-   **Services :** Classes utilitaires, comme la connexion à la base de données.
    -   **Emplacement :** `src/Core/`

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
│   ├── Core/             # Services principaux (ex: connexion BDD)
│   ├── Entities/         # Classes Entités (objets métier)
│   ├── Repositories/     # Classes pour l'accès aux données
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
