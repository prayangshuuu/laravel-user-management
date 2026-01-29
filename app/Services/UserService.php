<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function getAllUsers(): Collection
    {
        return User::all();
    }

    public function updateUser(User $user, array $data): bool
    {
        return $user->update($data);
    }

    public function deleteUser(User $user): ?bool
    {
        return $user->delete();
    }
}
