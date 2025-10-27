<?php

namespace App\Entities;

class User
{
    private $id;
    private $email;
    private $roles;
    private $password;
    private $login;
    private $dateNew;
    private $dateLogin;

    // Getters
    public function getId() { return $this->id; }
    public function getEmail() { return $this->email; }
    public function getRoles(): array { return json_decode($this->roles, true) ?? []; }
    public function getPassword() { return $this->password; }
    public function getLogin() { return $this->login; }
    public function getDateNew() { return $this->dateNew; }
    public function getDateLogin() { return $this->dateLogin; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setEmail($email) { $this->email = $email; }
    public function setRoles(array $roles) { $this->roles = json_encode($roles); }
    public function setPassword($password) { $this->password = $password; }
    public function setLogin($login) { $this->login = $login; }
    public function setDateNew($dateNew) { $this->dateNew = $dateNew; }
    public function setDateLogin($dateLogin) { $this->dateLogin = $dateLogin; }
}
