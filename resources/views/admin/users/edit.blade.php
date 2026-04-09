@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Medewerker Bewerken</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label>Naam</label>
            <input type="text" name="name" class="w-full border rounded p-2" value="{{ $user->name }}" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" class="w-full border rounded p-2" value="{{ $user->email }}" required>
        </div>

        <div>
            <label>Wachtwoord (optioneel wijzigen)</label>
            <input type="password" name="password" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Bevestig wachtwoord</label>
            <input type="password" name="password_confirmation" class="w-full border rounded p-2">
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">Bijwerken</button>
    </form>
@endsection