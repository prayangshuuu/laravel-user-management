<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel User Management')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Minimal custom styles if needed */
        body { font-family: 'Inter', sans-serif; }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50 border-b-2 border-black">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ url('/') }}" class="text-xl font-black text-black tracking-tight uppercase">
                            User<span class="text-blue-600">Manager</span>
                        </a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="text-black hover:text-blue-600 px-3 py-2 rounded-md text-sm font-bold uppercase transition">Admin</a>
                        @else
                            <a href="{{ route('dashboard') }}" class="text-black hover:text-blue-600 px-3 py-2 rounded-md text-sm font-bold uppercase transition">Dashboard</a>
                        @endif

                        <div class="relative group">
                            <button class="flex items-center space-x-1 text-black hover:text-blue-600 focus:outline-none font-bold">
                                <span class="text-sm">{{ Auth::user()->name }}</span>
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            <div class="absolute right-0 mt-2 w-48 bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] py-1 hidden group-hover:block z-50">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm font-bold text-black hover:bg-gray-100 uppercase">Log Out</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-black hover:text-blue-600 px-3 py-2 rounded-md text-sm font-bold uppercase transition">Log in</a>
                        <a href="{{ route('register') }}" class="bg-blue-600 text-white border-2 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-[1px_1px_0px_0px_rgba(0,0,0,1)] active:shadow-none px-4 py-2 rounded-none text-sm font-bold uppercase transition">Register</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Flash Messages -->
        @if (session('success'))
            <div class="mb-8 bg-green-100 border-2 border-black p-4 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] flex items-center gap-3">
                <div class="bg-green-500 text-white p-1 border-2 border-black rounded-full flex-shrink-0">
                    <x-ui.icon name="check" class="w-4 h-4" />
                </div>
                <p class="font-bold text-black">{{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-8 bg-red-100 border-2 border-black p-4 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                <div class="flex items-center gap-3 mb-2">
                    <div class="bg-red-500 text-white p-1 border-2 border-black rounded-full flex-shrink-0">
                        <x-ui.icon name="x" class="w-4 h-4" />
                    </div>
                    <h3 class="font-bold text-black uppercase">Error</h3>
                </div>
                <ul class="list-disc list-inside text-sm font-bold text-red-800 ml-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t-2 border-black mt-auto">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <p class="text-center text-sm font-bold text-gray-500 uppercase tracking-wide">
                &copy; {{ date('Y') }} User Management System. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>
