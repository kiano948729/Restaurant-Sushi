@extends('layouts.admin')

@section('content')
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-3xl font-bold">Medewerkers</h1>
        <a href="{{ route('admin.users.create') }}"
            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 flex items-center gap-2">
            <i data-lucide="user-plus"></i> Nieuwe medewerker
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white border rounded shadow overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Naam</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Email</th>
                    <th class="py-3 px-4 text-left text-sm font-semibold text-gray-700">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr class="border-b border-gray-100">
                        <td class="py-3 px-4">{{ $user->name }}</td>
                        <td class="py-3 px-4">{{ $user->email }}</td>
                        <td class="py-3 px-4 flex gap-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="text-blue-600 hover:text-blue-800">Bewerken</a>
                            <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}"
                                onsubmit="return confirm('Weet je het zeker?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Verwijderen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection