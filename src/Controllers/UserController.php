<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends Controller
{
    public function index()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll();
        $this->render('user/index', ['users' => $users]);
    }

    public function show($id)
    {
        $userModel = new UserModel();
        $user = $userModel->findById($id);
        $this->render('user/show', ['user' => $user]);
    }

    public function new()
    {
        $this->render('user/new');
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new UserModel();
            $userModel->create($_POST);
            header('Location: /user');
        }
    }

    public function edit($id)
    {
        $userModel = new UserModel();
        $user = $userModel->findById($id);
        $this->render('user/edit', ['user' => $user]);
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new UserModel();
            $userModel->update($id, $_POST);
            header('Location: /user');
        }
    }

    public function delete($id)
    {
        $userModel = new UserModel();
        $userModel->delete($id);
        header('Location: /user');
    }
}
