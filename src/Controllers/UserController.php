<?php

namespace App\Controllers;

use App\Repositories\UserRepository;
use App\Entities\User;
use App\Core\AuthService; 

class UserController extends Controller
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function index()
    {
        AuthService::requireLogin(); 

        $admin = AuthService::isAdmin();

        $users = $this->userRepository->findAll();
        $this->render('user/index', ['users' => $users, 'admin' => $admin]);
    }

    public function show($id)
    {
        AuthService::requireLogin(); 

        $admin = AuthService::isAdmin();

        $user = $this->userRepository->findById($id);
        $this->render('user/show', ['user' => $user, 'admin' => $admin]);
    }

    public function new()
    {
        // GARDIEN : Seuls les admins peuvent afficher le formulaire de création
        AuthService::requireAdmin(); 
        $this->render('user/new');
    }

    public function create()
    {
        // GARDIEN : Seuls les admins peuvent créer un utilisateur
        AuthService::requireAdmin(); 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setLogin($_POST['login']);
            $user->setPassword($_POST['password']);
            
            // On vérifie que le rôle envoyé est valide
            $role = $_POST['roles']; // ex: "ROLE_USER" ou "ROLE_ADMIN"
            if (in_array($role, ['ROLE_USER', 'ROLE_ADMIN'])) {
                 $user->setRoles([$role]);
            } else {
                 $user->setRoles(['ROLE_USER']); // Sécurité par défaut
            }

            $this->userRepository->create($user);
            header('Location: /user');
        }
    }

    public function edit($id)
    {
        // GARDIEN : Seuls les admins peuvent afficher le formulaire d'édition
        AuthService::requireAdmin(); 
        $user = $this->userRepository->findById($id);
        $this->render('user/edit', ['user' => $user]);
    }

    public function update($id)
    {
        // GARDIEN : Seuls les admins peuvent mettre à jour un utilisateur
        AuthService::requireAdmin(); 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $this->userRepository->findById($id);
            $user->setEmail($_POST['email']);
            $user->setLogin($_POST['login']);
            
            // Même vérification de sécurité pour les rôles
            $role = $_POST['roles'];
            if (in_array($role, ['ROLE_USER', 'ROLE_ADMIN'])) {
                 $user->setRoles([$role]);
            } // sinon, on ne touche pas aux rôles existants

            if (!empty($_POST['password'])) {
                $user->setPassword($_POST['password']);
            }

            $this->userRepository->update($user);
            header('Location: /user');
        }
    }

    public function delete($id)
    {
        // GARDIEN : Seuls les admins peuvent supprimer un utilisateur
        AuthService::requireAdmin(); 
        $this->userRepository->delete($id);
        header('Location: /user');
    }
}