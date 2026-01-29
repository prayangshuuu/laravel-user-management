<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends BaseApiController
{
    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt($request->validated())) {
            /** @var \App\Models\User $user */
            $user = Auth::user();
            $token = $user->createToken('api-token')->plainTextToken;

            return $this->successResponse([
                'user' => new UserResource($user),
                'token' => $token,
            ], 'Login successful.');
        }

        return $this->errorResponse('The provided credentials do not match our records.', 401);
    }

    public function logout(Request $request): JsonResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();
        $user->currentAccessToken()->delete();

        return $this->successResponse(null, 'Logged out successfully.');
    }

    public function user(Request $request): JsonResponse
    {
        return $this->successResponse(new UserResource($request->user()));
    }
}
