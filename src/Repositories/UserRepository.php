<?php

namespace App\Repositories;

use App\Entities\User;
use App\Core\Database;

class UserRepository
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    private function hydrate(array $data): User
    {
        $user = new User();
        $user->setId($data['id']);
        $user->setEmail($data['email']);
        $user->setRoles(json_decode($data['roles'], true));
        $user->setPassword($data['password']);
        $user->setLogin($data['login']);
        $user->setDateNew($data['dateNew']);
        $user->setDateLogin($data['dateLogin']);
        return $user;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM user');
        $usersData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $users = [];
        foreach ($usersData as $userData) {
            $users[] = $this->hydrate($userData);
        }
        return $users;
    }
    
    public function findById($id): ?User
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data ? $this->hydrate($data) : null;
    }

    public function findByEmail(string $email): ?User
    {
        $stmt = $this->pdo->prepare('SELECT * FROM user WHERE email = :email');
        $stmt->execute(['email' => $email]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        // On réutilise votre super méthode hydrate !
        return $data ? $this->hydrate($data) : null;
    }

    public function updateLastLogin(int $id): void
    {
        $stmt = $this->pdo->prepare('UPDATE user SET dateLogin = NOW() WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }

    public function create(User $user): void
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO user (email, roles, password, login, dateNew) 
             VALUES (:email, :roles, :password, :login, NOW())'
        );
        $stmt->execute([
            'email' => $user->getEmail(),
            'roles' => json_encode($user->getRoles()),
            'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
            'login' => $user->getLogin(),
        ]);
    }

    public function update(User $user): void
    {
        $stmt = $this->pdo->prepare(
            'UPDATE user 
             SET email = :email, roles = :roles, login = :login 
             WHERE id = :id'
        );
        $stmt->execute([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'roles' => json_encode($user->getRoles()),
            'login' => $user->getLogin(),
        ]);

        if ($user->getPassword()) {
            $stmt = $this->pdo->prepare('UPDATE user SET password = :password WHERE id = :id');
            $stmt->execute([
                'id' => $user->getId(),
                'password' => password_hash($user->getPassword(), PASSWORD_DEFAULT),
            ]);
        }
    }

    public function delete($id): void
    {
        $stmt = $this->pdo->prepare('DELETE FROM user WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}
