<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
</head>
<body class="bg-yellow-50 text-black min-h-screen flex flex-col md:flex-row">

    <!-- Sidebar -->
    <aside class="w-full md:w-64 bg-white border-r-2 border-black flex-shrink-0 min-h-screen">
        <div class="p-6 border-b-2 border-black bg-blue-600">
            <a href="{{ route('admin.dashboard') }}" class="text-2xl font-black text-white uppercase tracking-tighter flex items-center gap-2">
                <span>Admin</span><span class="text-yellow-300">Panel</span>
            </a>
        </div>

        <nav class="p-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-3 font-bold border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] {{ request()->routeIs('admin.dashboard') ? 'bg-yellow-300 text-black' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.users.index') }}" class="block px-4 py-3 font-bold border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] {{ request()->routeIs('admin.users.*') ? 'bg-yellow-300 text-black' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                Manage Users
            </a>

            <a href="{{ route('admin.password.change') }}" class="block px-4 py-3 font-bold border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] {{ request()->routeIs('admin.password.change') ? 'bg-yellow-300 text-black' : 'bg-white text-gray-700 hover:bg-gray-50' }}">
                Change Password
            </a>

            <form method="POST" action="{{ route('logout') }}" class="pt-4 mt-4 border-t-2 border-black border-dashed">
                @csrf
                <button type="submit" class="w-full px-4 py-3 font-bold text-white bg-red-600 border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none uppercase tracking-wide">
                    Logout
                </button>
            </form>
        </nav>

        <div class="p-4 mt-auto">
            <div class="p-3 bg-gray-100 border-2 border-black text-xs font-bold text-center">
                Logged in as:<br>
                <span class="text-blue-600">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow p-6 md:p-10 overflow-y-auto">
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

</body>
</html>
