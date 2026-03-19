@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Nieuw Gerecht</h1>

    <form method="POST" action="{{ route('admin.dishes.store') }}" class="bg-white p-6 rounded shadow space-y-4">

        @csrf

        <div>
            <label class="block text-sm font-medium">Naam</label>
            <input name="name" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block text-sm font-medium">Categorie</label>
            <input name="category" class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block text-sm font-medium">Omschrijving</label>
            <textarea name="description" class="w-full border rounded p-2"></textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Prijs</label>
            <input name="price" type="number" step="0.01" class="w-full border rounded p-2">
        </div>

        <button class="bg-[#F5A623] text-white px-4 py-2 rounded">
            Gerecht opslaan
        </button>

    </form>

@endsection