<?php

namespace App\Controllers;

use App\Repositories\UserRepository;
use App\Entities\User;
// Il hérite de votre classe Controller de base pour avoir la méthode render()
use App\Controllers\Controller; 

class AuthController extends Controller
{
    private $userRepository;

    /**
     * Comme dans votre UserController, on instancie le repo
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /**
     * Affiche le formulaire de connexion
     * Gère la route: GET /login
     */
    public function showLoginForm()
    {
        // Récupère les messages de l'URL pour les afficher dans la vue
        $error = $_GET['error'] ?? null;
        $success = $_GET['success'] ?? null;
        
        // Utilise votre méthode render() pour afficher la vue
        $this->render('auth/login', [
            'error' => $error,
            'success' => $success
        ]);
    }

    /**
     * Traite la soumission du formulaire de connexion
     * Gère la route: POST /login
     */
    public function processLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userRepository->findByEmail($email);

            // 1. Vérifie si l'utilisateur existe
            // 2. Vérifie si le mot de passe correspond au hash stocké
            if ($user && password_verify($password, $user->getPassword())) {
                
                // Le mot de passe est correct !
                
                // Met à jour la date de dernière connexion
                $this->userRepository->updateLastLogin($user->getId());

                // Stocke les infos de l'utilisateur en session
                $_SESSION['user_id'] = $user->getId();
                $_SESSION['user_email'] = $user->getEmail();
                $_SESSION['user_roles'] = $user->getRoles();

                // Sécurité: Régénère l'ID de session
                session_regenerate_id(true);

                // Redirige vers la page des produits (ou un dashboard)
                header('Location: /');
                exit;

            } else {
                // Echec de la connexion
                header('Location: /login?error=invalid_credentials');
                exit;
            }
        }
    }

    /**
     * Affiche le formulaire d'inscription
     * Gère la route: GET /register
     */
    public function showRegisterForm()
    {
        $error = $_GET['error'] ?? null;
        $this->render('auth/register', ['error' => $error]);
    }

    /**
     * Traite la soumission du formulaire d'inscription
     * Gère la route: POST /register
     */
    public function processRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            // 1. Validation simple (vous pouvez l'améliorer)
            if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['login'])) {
                header('Location: /register?error=fields_required');
                exit;
            }
            
            // 2. Vérifier si l'email existe déjà
            if ($this->userRepository->findByEmail($_POST['email'])) {
                header('Location: /register?error=email_taken');
                exit;
            }
            
            // 3. Créer l'entité (comme dans votre UserController)
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setLogin($_POST['login']);
            $user->setPassword($_POST['password']); // Le repo s'occupe du hash
            $user->setRoles(['ROLE_USER']); // Rôle par défaut pour les nouveaux inscrits

            // 4. Enregistrer en BDD
            $this->userRepository->create($user);
            
            // 5. Rediriger vers la page de connexion avec un message de succès
            header('Location: /login?success=register');
            exit;
        }
    }

    /**
     * Gère la déconnexion de l'utilisateur
     * Gère la route: GET /logout
     */
    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: /login'); // On le ramène à la page de connexion
        exit;
    }
}