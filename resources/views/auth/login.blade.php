@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-200px)]">
        <x-ui.card class="w-full max-w-md">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-black text-black uppercase tracking-tight mb-2">Welcome Back</h2>
                <p class="text-gray-600 font-medium">Please enter your details to sign in.</p>
            </div>

            <!-- Demo Credentials Helper -->
            <div class="mb-8 grid grid-cols-2 gap-4">
                <div onclick="fillCredentials('admin@demo.com', 'admin123')" class="cursor-pointer p-3 border-2 border-black bg-gray-50 hover:bg-blue-50 transition-colors text-center shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:translate-x-[1px] active:translate-y-[1px] active:shadow-none group">
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">Admin Demo</p>
                    <p class="text-sm font-bold text-black group-hover:text-blue-600 transition-colors">Login as Admin</p>
                </div>
                <div onclick="fillCredentials('user@demo.com', 'user123')" class="cursor-pointer p-3 border-2 border-black bg-gray-50 hover:bg-blue-50 transition-colors text-center shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:translate-x-[1px] active:translate-y-[1px] active:shadow-none group">
                    <p class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-1">User Demo</p>
                    <p class="text-sm font-bold text-black group-hover:text-blue-600 transition-colors">Login as User</p>
                </div>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="mb-5 relative">
                    <label for="email" class="block text-sm font-black text-black mb-2 uppercase tracking-wide">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full pl-10 pr-4 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold placeholder-gray-400 bg-white" placeholder="name@example.com" required autofocus>
                    </div>
                </div>

                <div class="mb-8 relative">
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-black text-black uppercase tracking-wide">Password</label>
                        <a href="{{ route('forgot-password') }}" class="text-xs font-bold text-blue-600 hover:text-blue-800 hover:underline uppercase tracking-wide">Forgot Password?</a>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <x-ui.icon name="lock" class="w-5 h-5" />
                        </div>
                        <input type="password" name="password" id="password" class="w-full pl-10 pr-4 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold placeholder-gray-400 bg-white" placeholder="••••••••" required>
                    </div>
                </div>

                <x-ui.button type="submit" variant="primary" :fullWidth="true">
                    Log In
                </x-ui.button>
            </form>

            <div class="mt-8 pt-6 border-t-2 border-black text-center">
                <p class="text-sm font-medium text-gray-600">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-black font-black hover:underline decoration-2 decoration-blue-600 ml-1">Sign up</a>
                </p>
            </div>
        </x-ui.card>
    </div>

    <script>
        function fillCredentials(email, password) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
        }
    </script>
@endsection
