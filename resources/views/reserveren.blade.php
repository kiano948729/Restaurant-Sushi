@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-3xl font-bold text-white mb-6">Reserveer een Tafel</h1>
    <form action="{{ route('reservations.store') }}" method="POST" class="bg-[#1a1a1a] p-8 rounded-lg shadow">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-white mb-2">Naam</label>
                <input type="text" name="name" class="w-full p-3 rounded bg-gray-800 text-white" required>
            </div>
            <div>
                <label class="block text-white mb-2">Email</label>
                <input type="email" name="email" class="w-full p-3 rounded bg-gray-800 text-white" required>
            </div>
            <div>
                <label class="block text-white mb-2">Telefoon</label>
                <input type="text" name="phone" class="w-full p-3 rounded bg-gray-800 text-white">
            </div>
            <div>
                <label class="block text-white mb-2">Aantal Gasten</label>
                <input type="number" name="guests" class="w-full p-3 rounded bg-gray-800 text-white" min="1" required>
            </div>
            <div>
                <label class="block text-white mb-2">Datum</label>
                <input type="date" name="date" class="w-full p-3 rounded bg-gray-800 text-white" required>
            </div>
            <div>
                <label class="block text-white mb-2">Tijd</label>
                <input type="time" name="time" class="w-full p-3 rounded bg-gray-800 text-white" required>
            </div>
        </div>
        <button type="submit" class="mt-6 bg-[#F5A623] text-[#0F0F0F] px-6 py-3 rounded hover:bg-[#F5A623]/90">Reserveer</button>
    </form>
</div>
@endsection