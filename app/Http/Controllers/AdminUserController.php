<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): View
    {
        $users = $this->userService->getAllUsers();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user): View
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $this->userService->updateUser($user, $request->validated());

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user): RedirectResponse
    {
        $this->userService->deleteUser($user);
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
