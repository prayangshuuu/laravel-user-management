@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- Page Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 border-b-2 border-black pb-6">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-yellow-300 border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)]">
                    <x-ui.icon name="dashboard" class="w-6 h-6 text-black" />
                </div>
                <div>
                    <h1 class="text-4xl font-black text-black uppercase tracking-tight leading-none">Dashboard</h1>
                    <p class="text-sm font-bold text-gray-500 mt-1">Overview of your account.</p>
                </div>
            </div>

            <div class="bg-white border-2 border-black px-4 py-2 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] font-bold text-sm flex items-center gap-2">
                <div class="w-2 h-2 bg-green-500 rounded-full border border-black"></div>
                System Online
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Profile Summary Widget -->
            <div class="bg-white border-2 border-black p-6 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-black text-black uppercase tracking-tight group-hover:text-blue-600 transition-colors">Profile</h3>
                    <div class="p-2 bg-blue-100 border-2 border-black rounded-full">
                        <x-ui.icon name="users" class="w-5 h-5 text-blue-700" />
                    </div>
                </div>
                <div class="space-y-3">
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">Full Name</p>
                        <p class="text-base font-black text-black">{{ Auth::user()->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">Email Address</p>
                        <p class="text-sm font-bold text-black break-all">{{ Auth::user()->email }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">Role</p>
                        <span class="inline-block mt-1 px-2 py-1 text-xs border-2 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] uppercase tracking-wide {{ Auth::user()->role === 'admin' ? 'bg-purple-200 text-purple-900' : 'bg-blue-200 text-blue-900' }}">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Account Status Widget -->
            <div class="bg-white border-2 border-black p-6 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-black text-black uppercase tracking-tight group-hover:text-green-600 transition-colors">Status</h3>
                    <div class="p-2 bg-green-100 border-2 border-black rounded-full">
                        <x-ui.icon name="check" class="w-5 h-5 text-green-700" />
                    </div>
                </div>
                <div class="flex flex-col h-full justify-between">
                    <div>
                        <p class="text-sm font-bold text-gray-500 mb-2">Account Standing</p>
                        <div class="flex items-center gap-2 mb-4">
                            <div class="w-3 h-3 bg-green-500 rounded-full border border-black"></div>
                            <span class="text-xl font-black text-black uppercase">Active</span>
                        </div>
                        <p class="text-xs font-bold text-gray-400">Your account is fully verified and operational.</p>
                    </div>
                </div>
            </div>

            <!-- Security Widget -->
            <div class="bg-white border-2 border-black p-6 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] transition-all group">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-black text-black uppercase tracking-tight group-hover:text-red-600 transition-colors">Security</h3>
                    <div class="p-2 bg-red-100 border-2 border-black rounded-full">
                        <x-ui.icon name="lock" class="w-5 h-5 text-red-700" />
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">Password Status</p>
                        <div class="flex items-center gap-2 mt-1">
                            <x-ui.icon name="check" class="w-4 h-4 text-green-600" />
                            <span class="text-sm font-bold text-black">Secure</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-500 uppercase tracking-wide">Last Login</p>
                        <p class="text-sm font-bold text-black mt-1">Just now</p>
                    </div>
                    <div class="pt-2 border-t-2 border-black border-dashed">
                        <p class="text-xs font-bold text-gray-400">We recommend updating your password regularly.</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Widget -->
            <div class="bg-yellow-50 border-2 border-black p-6 shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[6px_6px_0px_0px_rgba(0,0,0,1)] transition-all group md:col-span-2 lg:col-span-3">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-black text-black uppercase tracking-tight">Quick Actions</h3>
                    <div class="p-2 bg-white border-2 border-black rounded-full">
                        <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                </div>
                <div class="flex flex-wrap gap-4">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:bg-red-50 hover:text-red-600 hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:shadow-none transition-all font-bold text-sm uppercase tracking-wide">
                            <x-ui.icon name="logout" class="w-4 h-4 mr-2" />
                            Log Out
                        </button>
                    </form>

                    @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center px-4 py-2 bg-black text-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:bg-gray-800 hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:shadow-none transition-all font-bold text-sm uppercase tracking-wide">
                            <x-ui.icon name="dashboard" class="w-4 h-4 mr-2" />
                            Admin Panel
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
