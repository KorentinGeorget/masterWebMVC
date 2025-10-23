<?php

namespace App\Models;

class UserModel
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function findAll()
    {
        $stmt = $this->pdo->query('SELECT * FROM user');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function findById($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO user (email, roles, password, login, dateNew) 
             VALUES (:email, :roles, :password, :login, NOW())'
        );
        $stmt->execute([
            'email' => $data['email'],
            'roles' => json_encode([$data['roles']]),
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'login' => $data['login'],
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare(
            'UPDATE user 
             SET email = :email, roles = :roles, login = :login 
             WHERE id = :id'
        );
        $stmt->execute([
            'id' => $id,
            'email' => $data['email'],
            'roles' => json_encode([$data['roles']]),
            'login' => $data['login'],
        ]);

        if (!empty($data['password'])) {
            $stmt = $this->pdo->prepare('UPDATE user SET password = :password WHERE id = :id');
            $stmt->execute([
                'id' => $id,
                'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            ]);
        }
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM user WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
