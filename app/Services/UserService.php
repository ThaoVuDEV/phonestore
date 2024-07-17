<?php
// app/Services/UserService.php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function register(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function findByEmail(string $email)
    {
        return $this->userRepository->findByEmail($email);
    }
}
