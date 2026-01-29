@extends('layouts.app')

@section('title', 'Register')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-200px)]">
        <x-ui.card class="w-full max-w-md">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-black uppercase tracking-tight mb-2">Create Account</h2>
                <p class="text-gray-600 font-medium">Join us to get started.</p>
            </div>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="mb-5 relative">
                    <label for="name" class="block text-sm font-black text-black mb-2 uppercase tracking-wide">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full pl-10 pr-4 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold placeholder-gray-400 bg-white" placeholder="John Doe" required autofocus>
                    </div>
                </div>

                <div class="mb-5 relative">
                    <label for="email" class="block text-sm font-black text-black mb-2 uppercase tracking-wide">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full pl-10 pr-4 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold placeholder-gray-400 bg-white" placeholder="name@example.com" required>
                    </div>
                </div>

                <div class="mb-5 relative">
                    <label for="password" class="block text-sm font-black text-black mb-2 uppercase tracking-wide">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <x-ui.icon name="lock" class="w-5 h-5" />
                        </div>
                        <input type="password" name="password" id="password" class="w-full pl-10 pr-4 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold placeholder-gray-400 bg-white" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="mb-8 relative">
                    <label for="password_confirmation" class="block text-sm font-black text-black mb-2 uppercase tracking-wide">Confirm Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <x-ui.icon name="check" class="w-5 h-5" />
                        </div>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="w-full pl-10 pr-4 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold placeholder-gray-400 bg-white" placeholder="••••••••" required>
                    </div>
                </div>

                <x-ui.button type="submit" variant="primary" :fullWidth="true">
                    Register
                </x-ui.button>
            </form>

            <div class="mt-8 pt-6 border-t-2 border-black text-center">
                <p class="text-sm font-medium text-gray-600">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-black font-black hover:underline decoration-2 decoration-blue-600 ml-1">Log in</a>
                </p>
            </div>
        </x-ui.card>
    </div>
@endsection
