@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="max-w-6xl mx-auto py-12">
        <!-- Hero Section -->
        <div class="bg-white border-2 border-black p-8 md:p-16 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] mb-16 text-center">
            <div class="inline-flex items-center justify-center p-4 bg-yellow-300 border-2 border-black rounded-full shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] mb-8">
                <x-ui.icon name="users" class="w-10 h-10 text-black" />
            </div>

            <h1 class="text-5xl md:text-6xl font-black text-black uppercase tracking-tighter mb-6 leading-none">
                User<span class="text-blue-600">Manager</span>
            </h1>

            <p class="text-xl md:text-2xl font-bold text-gray-600 max-w-3xl mx-auto mb-10 leading-relaxed">
                A simple, secure, and efficient way to manage users and roles.
                <span class="block text-base text-gray-400 mt-2 font-medium">Powered by Laravel & Tailwind CSS</span>
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-6">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <x-ui.button href="{{ route('admin.dashboard') }}" variant="primary" class="text-lg px-8 py-4">
                            <x-ui.icon name="dashboard" class="w-5 h-5 mr-2" />
                            Go to Admin Panel
                        </x-ui.button>
                    @else
                        <x-ui.button href="{{ route('dashboard') }}" variant="primary" class="text-lg px-8 py-4">
                            <x-ui.icon name="dashboard" class="w-5 h-5 mr-2" />
                            Go to Dashboard
                        </x-ui.button>
                    @endif
                @else
                    <x-ui.button href="{{ route('register') }}" variant="primary" class="text-lg px-8 py-4">
                        Get Started
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </x-ui.button>
                    <x-ui.button href="{{ route('login') }}" variant="secondary" class="text-lg px-8 py-4">
                        Log In
                    </x-ui.button>
                @endauth
            </div>
        </div>

        <!-- Feature Highlights -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <!-- Feature 1 -->
            <div class="bg-white border-2 border-black p-8 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] transition-all group">
                <div class="flex items-center justify-between mb-6">
                    <div class="p-3 bg-blue-100 border-2 border-black rounded-full group-hover:bg-blue-500 group-hover:text-white transition-colors">
                        <x-ui.icon name="lock" class="w-6 h-6 text-blue-700 group-hover:text-white" />
                    </div>
                </div>
                <h3 class="text-2xl font-black text-black uppercase tracking-tight mb-3">Secure Auth</h3>
                <p class="font-bold text-gray-500">Robust authentication system with secure password hashing and session management.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white border-2 border-black p-8 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] transition-all group">
                <div class="flex items-center justify-between mb-6">
                    <div class="p-3 bg-purple-100 border-2 border-black rounded-full group-hover:bg-purple-500 group-hover:text-white transition-colors">
                        <x-ui.icon name="check" class="w-6 h-6 text-purple-700 group-hover:text-white" />
                    </div>
                </div>
                <h3 class="text-2xl font-black text-black uppercase tracking-tight mb-3">Role Access</h3>
                <p class="font-bold text-gray-500">Granular access control distinguishing between standard users and administrators.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white border-2 border-black p-8 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] transition-all group">
                <div class="flex items-center justify-between mb-6">
                    <div class="p-3 bg-green-100 border-2 border-black rounded-full group-hover:bg-green-500 group-hover:text-white transition-colors">
                        <x-ui.icon name="users" class="w-6 h-6 text-green-700 group-hover:text-white" />
                    </div>
                </div>
                <h3 class="text-2xl font-black text-black uppercase tracking-tight mb-3">User Management</h3>
                <p class="font-bold text-gray-500">Full administrative capabilities to view, edit, and manage user accounts efficiently.</p>
            </div>
        </div>
    </div>
@endsection
