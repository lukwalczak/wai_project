<?php
declare(strict_types=1);

namespace Controllers;

class UserController extends AbstractController
{

    private $viewPath = "User/";

    public function register()
    {
        if (empty($this->data["username"]) || empty($this->data["email"] || empty($this->data["password"]))) {
            $this->view($this->viewPath . 'register');
            var_dump("A");
            return;
        }
        $username = $this->data["username"];
        $email = $this->data["email"];
        $passwordHash = password_hash($this->data["password"], PASSWORD_DEFAULT);
        
        $user = new \Models\User($username, $email, $passwordHash);

        $this->repository->addUser($user);
        $this->view($this->viewPath . 'register');
    }

    public function login()
    {
        $this->view($this->viewPath . 'login');
    }
}