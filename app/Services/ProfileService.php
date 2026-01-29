<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileService
{
    public function changePassword(User $user, string $newPassword): bool
    {
        return $user->update([
            'password' => Hash::make($newPassword),
        ]);
    }
}
