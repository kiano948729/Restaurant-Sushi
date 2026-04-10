@extends('layouts.admin')

@section('content')

    <h1 class="text-3xl font-bold mb-6">Gerecht aanpassen</h1>

    <form method="POST" action="{{ route('admin.dishes.update', $dish->id) }}" class="bg-white p-6 rounded shadow space-y-4"
        enctype="multipart/form-data"> 

        @csrf
        @method('PUT')

        <div>
            <label>Naam</label>
            <input name="name" value="{{ $dish->name }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Categorie</label>
            <input name="category" value="{{ $dish->category }}" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Omschrijving</label>
            <textarea name="description" class="w-full border rounded p-2">{{ $dish->description }}</textarea>
        </div>

        <div>
            <label>Prijs</label>
            <input name="price" value="{{ $dish->price }}" type="number" step="0.01" class="w-full border rounded p-2">
        </div>

        <div>
            <label>Foto</label>
            @if($dish->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $dish->image) }}" alt="Huidige foto" class="w-32 h-32 object-cover rounded">
                </div>
            @endif
            <input type="file" name="image" class="w-full border rounded p-2">
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Wijzigingen opslaan
        </button>

    </form>

@endsection