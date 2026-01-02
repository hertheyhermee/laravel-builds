<?php

namespace App\Auth\Services;

use App\Models\User;
use Illuminate\Support\Facades\URL;

class EmailVerificationService{
    public function generate(User $user)
    {
        return URL::temporarySignedRoute(
            'email.verify', 
            now()->addMinutes(30), 
            ['user' => $user->id]);
    }

    public function verify(User $user)
    {
        if(!$user->hasVerifiedEmail()){
            $user->markEmailAsVerified();
        }
    }
}