<?php

namespace App\Core;

class AuthService
{
    /**
     * VÉRIFICATION SIMPLE (pour les vues)
     * L'utilisateur est-il connecté ?
     */
    public static function isLoggedIn(): bool
    {
        return isset($_SESSION['user_id']);
    }

    /**
     * VÉRIFICATION ADMIN (pour les vues)
     * L'utilisateur est-il un administrateur ?
     */
    public static function isAdmin(): bool
    {
        // On vérifie qu'il est connecté, que la session 'roles' existe,
        // et que 'ROLE_ADMIN' est bien dans le tableau des rôles.
        return self::isLoggedIn() &&
               isset($_SESSION['user_roles']) &&
               in_array('ROLE_ADMIN', $_SESSION['user_roles']);
    }

    /**
     * GARDIEN DE CONTRÔLEUR (pour les pages "membres")
     * Redirige si l'utilisateur n'est pas connecté.
     */
    public static function requireLogin(): void
    {
        if (!self::isLoggedIn()) {
            header('Location: /login?error=protected');
            exit;
        }
    }

    /**
     * GARDIEN DE CONTRÔLEUR (pour les pages "admin")
     * Redirige si l'utilisateur n'est pas un admin.
     */
    public static function requireAdmin(): void
    {
        // 1. Doit être connecté
        self::requireLogin();

        // 2. Doit être admin
        if (!self::isAdmin()) {
            // L'utilisateur est connecté, mais pas admin.
            // On le renvoie à l'accueil avec une erreur.
            header('Location: /?error=unauthorized');
            exit;
        }
    }
}