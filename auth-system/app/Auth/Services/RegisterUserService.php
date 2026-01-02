<?php

namespace App\Auth\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUserService
{
    public function register(string $name, string $email, string $password)
    {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }
}