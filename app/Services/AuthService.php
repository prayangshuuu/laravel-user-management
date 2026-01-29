<?php

namespace App\Services;

use App\Mail\NewPasswordMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthService
{
    public function registerUser(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function resetPassword(string $email): void
    {
        $user = User::where('email', $email)->firstOrFail();
        $newPassword = Str::random(10);

        $user->update([
            'password' => Hash::make($newPassword),
        ]);

        Mail::to($user->email)->send(new NewPasswordMail($newPassword));
    }
}
