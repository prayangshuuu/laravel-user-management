<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;

class AdminUserController extends BaseApiController
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(): JsonResponse
    {
        $users = $this->userService->getAllUsers();
        return $this->successResponse(UserResource::collection($users));
    }

    public function update(UpdateUserRequest $request, User $user): JsonResponse
    {
        $this->userService->updateUser($user, $request->validated());
        return $this->successResponse(new UserResource($user->fresh()), 'User updated successfully.');
    }

    public function destroy(User $user): JsonResponse
    {
        $this->userService->deleteUser($user);
        return $this->successResponse(null, 'User deleted successfully.');
    }
}
