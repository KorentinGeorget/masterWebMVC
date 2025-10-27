<?php

namespace App\Controllers;

use App\Repositories\UserRepository;
use App\Entities\User;

class UserController extends Controller
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function index()
    {
        $users = $this->userRepository->findAll();
        $this->render('user/index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = $this->userRepository->findById($id);
        $this->render('user/show', ['user' => $user]);
    }

    public function new()
    {
        $this->render('user/new');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->setEmail($_POST['email']);
            $user->setLogin($_POST['login']);
            $user->setPassword($_POST['password']);
            $user->setRoles([$_POST['roles']]);

            $this->userRepository->create($user);
            header('Location: /user');
        }
    }

    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
        $this->render('user/edit', ['user' => $user]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $this->userRepository->findById($id);
            $user->setEmail($_POST['email']);
            $user->setLogin($_POST['login']);
            $user->setRoles([$_POST['roles']]);

            if (!empty($_POST['password'])) {
                $user->setPassword($_POST['password']);
            }

            $this->userRepository->update($user);
            header('Location: /user');
        }
    }

    public function delete($id)
    {
        $this->userRepository->delete($id);
        header('Location: /user');
    }
}
