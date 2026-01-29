@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-8 flex items-center gap-4">
            <a href="{{ route('admin.users.index') }}" class="p-3 bg-white border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none transition-all">
                <x-ui.icon name="arrow-left" class="w-5 h-5" />
            </a>
            <div>
                <h1 class="text-3xl font-black text-black uppercase tracking-tight leading-none">Edit User</h1>
                <p class="text-sm font-bold text-gray-500 mt-1">Update user details and permissions.</p>
            </div>
        </div>

        <x-ui.card>
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6 relative">
                    <label for="name" class="block text-sm font-black text-black mb-2 uppercase tracking-wide">Full Name</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full pl-10 pr-4 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold placeholder-gray-400 bg-white" required>
                    </div>
                </div>

                <div class="mb-6 relative">
                    <label for="email" class="block text-sm font-black text-black mb-2 uppercase tracking-wide">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full pl-10 pr-4 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold placeholder-gray-400 bg-white" required>
                    </div>
                </div>

                <div class="mb-8 relative">
                    <label for="role" class="block text-sm font-black text-black mb-2 uppercase tracking-wide">Role</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-gray-500">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <select name="role" id="role" class="w-full pl-10 pr-10 py-3 border-2 border-black focus:outline-none focus:shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] transition-all font-bold appearance-none bg-white cursor-pointer">
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-black">
                            <x-ui.icon name="chevron-down" class="w-5 h-5" />
                        </div>
                    </div>
                </div>

                <div class="flex justify-end gap-4 pt-6 border-t-2 border-black">
                    <a href="{{ route('admin.users.index') }}" class="px-6 py-3 font-bold text-black bg-gray-100 border-2 border-black shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none transition-all uppercase tracking-wide text-sm">
                        Cancel
                    </a>
                    <x-ui.button type="submit" variant="primary">
                        Update User
                    </x-ui.button>
                </div>
            </form>
        </x-ui.card>
    </div>
@endsection
