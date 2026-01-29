<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminProfileController extends Controller
{
    protected ProfileService $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function showChangePasswordForm(): View
    {
        return view('admin.profile.change-password');
    }

    public function changePassword(ChangePasswordRequest $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $this->profileService->changePassword($user, $request->validated('password'));

        return back()->with('success', 'Password changed successfully.');
    }
}
