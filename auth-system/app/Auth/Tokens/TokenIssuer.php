<?php
namespace App\Auth\Tokens;

use App\Models\User;

class TokenIssuer
{
    public function issueToken(User $user)
    {
        return $user->createToken('auth_token')->plainTextToken;
    }
}