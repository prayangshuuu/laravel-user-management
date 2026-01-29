@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="flex justify-center items-center min-h-[calc(100vh-200px)]">
        <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg border border-gray-100">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Welcome Back</h2>

            <!-- Demo Credentials Helper -->
            <div class="mb-6 grid grid-cols-2 gap-3">
                <div onclick="fillCredentials('admin@demo.com', 'admin123')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:bg-gray-50 hover:border-blue-300 transition group text-center">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Admin Demo</p>
                    <p class="text-sm font-medium text-gray-800 group-hover:text-blue-600">Login as Admin</p>
                </div>
                <div onclick="fillCredentials('user@demo.com', 'user123')" class="cursor-pointer p-3 border border-gray-200 rounded-lg hover:bg-gray-50 hover:border-blue-300 transition group text-center">
                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">User Demo</p>
                    <p class="text-sm font-medium text-gray-800 group-hover:text-blue-600">Login as User</p>
                </div>
            </div>

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required autofocus>
                </div>

                <div class="mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <a href="{{ route('forgot-password') }}" class="text-sm text-blue-600 hover:text-blue-800 hover:underline">Forgot Password?</a>
                    </div>
                    <input type="password" name="password" id="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2.5 px-4 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition duration-300 shadow-md">
                    Log In
                </button>
            </form>

            <p class="mt-6 text-center text-sm text-gray-600">
                Don't have an account? <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800 font-medium hover:underline">Sign up</a>
            </p>
        </div>
    </div>

    <script>
        function fillCredentials(email, password) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
        }
    </script>
@endsection
