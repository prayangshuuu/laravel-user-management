@extends('layouts.admin')

@section('title', 'Change Password')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-8 flex items-center gap-4">
            <a href="{{ route('admin.dashboard') }}" class="p-3 bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none transition-all">
                <x-ui.icon name="arrow-left" class="w-5 h-5" />
            </a>
            <div>
                <h1 class="text-3xl font-black text-black uppercase tracking-tight leading-none">Change Password</h1>
                <p class="text-sm font-bold text-gray-500 mt-1">Secure your account with a new password.</p>
            </div>
        </div>

        <x-ui.card>
            <form action="{{ route('admin.password.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6 relative">
                    <label for="current_password" class="block text-sm font-black text-black mb-2 uppercase tracking-wide">Current Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <x-ui.icon name="lock" class="w-5 h-5" />
                        </div>
                        <input type="password" name="current_password" id="current_password" class="w-full pl-10 pr-4 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold placeholder-gray-400 bg-white" required>
                    </div>
                </div>

                <div class="mb-6 relative">
                    <label for="password" class="block text-sm font-black text-black mb-2 uppercase tracking-wide">New Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <x-ui.icon name="lock" class="w-5 h-5" />
                        </div>
                        <input type="password" name="password" id="password" class="w-full pl-10 pr-4 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold placeholder-gray-400 bg-white" required>
                    </div>
                </div>

                <div class="mb-8 relative">
                    <label for="password_confirmation" class="block text-sm font-black text-black mb-2 uppercase tracking-wide">Confirm New Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <x-ui.icon name="check" class="w-5 h-5" />
                        </div>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full pl-10 pr-4 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold placeholder-gray-400 bg-white" required>
                    </div>
                </div>

                <div class="flex justify-end gap-4 pt-6 border-t-2 border-black">
                    <a href="{{ route('admin.dashboard') }}" class="px-6 py-3 font-bold text-black bg-gray-100 border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none transition-all uppercase tracking-wide text-sm">
                        Cancel
                    </a>
                    <x-ui.button type="submit" variant="primary">
                        Change Password
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>
@endsection
