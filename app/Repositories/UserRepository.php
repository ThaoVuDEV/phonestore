<?php
// app/Repositories/UserRepository.php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
    public function userCreate(array $data)
    {
        $data['role'] = 'user'; // Đặt vai trò mặc định là 'user'
        return User::create($data);
    }
}
