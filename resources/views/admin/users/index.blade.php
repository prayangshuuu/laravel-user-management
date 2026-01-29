@extends('layouts.admin')

@section('title', 'User Management')

@section('content')
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <h1 class="text-4xl font-black text-black uppercase tracking-tight mb-1">Users</h1>
            <p class="font-bold text-gray-500">Manage system access.</p>
        </div>
        <div class="bg-white border-2 border-black px-4 py-2 shadow-[4px_4px_0px_0px_rgba(0,0,0,1)] font-bold text-sm">
            Total Users: {{ $users->count() }}
        </div>
    </div>

    <div class="bg-white border-2 border-black shadow-[8px_8px_0px_0px_rgba(0,0,0,1)] overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-black text-white border-b-2 border-black">
                    <tr>
                        <th class="py-4 px-6 text-left font-black uppercase tracking-wider text-sm">ID</th>
                        <th class="py-4 px-6 text-left font-black uppercase tracking-wider text-sm">Name</th>
                        <th class="py-4 px-6 text-left font-black uppercase tracking-wider text-sm">Email</th>
                        <th class="py-4 px-6 text-left font-black uppercase tracking-wider text-sm">Role</th>
                        <th class="py-4 px-6 text-center font-black uppercase tracking-wider text-sm">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y-2 divide-black">
                    @foreach ($users as $user)
                        <tr class="hover:bg-yellow-50 transition-colors font-bold text-gray-800">
                            <td class="py-4 px-6">{{ $user->id }}</td>
                            <td class="py-4 px-6">{{ $user->name }}</td>
                            <td class="py-4 px-6 font-mono text-sm">{{ $user->email }}</td>
                            <td class="py-4 px-6">
                                <span class="inline-block px-2 py-1 text-xs border-2 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] uppercase tracking-wide {{ $user->role === 'admin' ? 'bg-purple-200 text-purple-900' : 'bg-blue-200 text-blue-900' }}">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <a href="{{ route('admin.users.edit', $user) }}" class="p-2 bg-white border-2 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:bg-yellow-300 hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-[1px_1px_0px_0px_rgba(0,0,0,1)] active:shadow-none transition-all" title="Edit">
                                        <x-ui.icon name="edit" class="w-4 h-4 text-black" />
                                    </a>
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-white border-2 border-black shadow-[2px_2px_0px_0px_rgba(0,0,0,1)] hover:bg-red-500 hover:text-white hover:translate-x-[1px] hover:translate-y-[1px] hover:shadow-[1px_1px_0px_0px_rgba(0,0,0,1)] active:shadow-none transition-all" title="Delete">
                                            <x-ui.icon name="trash" class="w-4 h-4" />
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if($users->isEmpty())
            <div class="p-12 text-center bg-gray-50 flex flex-col items-center justify-center">
                <div class="bg-gray-200 p-4 rounded-full border-2 border-black mb-4">
                    <x-ui.icon name="users" class="w-8 h-8 text-gray-500" />
                </div>
                <h3 class="text-xl font-black text-black uppercase tracking-tight mb-1">No Users Found</h3>
                <p class="font-bold text-gray-500">There are currently no users in the system.</p>
            </div>
        @endif
    </div>
@endsection
