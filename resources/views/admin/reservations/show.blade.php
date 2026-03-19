@extends('../layouts.admin')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Reservering van {{ $reservation->name }}</h1>
            <p class="text-gray-600">Details van de reservering</p>
        </div>
        <a href="{{ route('admin.reservations.index') }}"
            class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 flex items-center gap-2">
            <i class="lucide lucide-arrow-left"></i> Terug
        </a>
    </div>

    <div class="bg-white border-gray-200 rounded-lg shadow p-6">
        <div class="mb-4">
            <p><strong>Naam:</strong> {{ $reservation->name }}</p>
            <p><strong>Email:</strong> {{ $reservation->email }}</p>
            <p><strong>Telefoon:</strong> {{ $reservation->phone }}</p>
            <p><strong>Datum:</strong> {{ $reservation->date->format('d-m-Y') }}</p>
            <p><strong>Tijd:</strong> {{ $reservation->time }}</p>
            <p><strong>Aantal gasten:</strong> {{ $reservation->guests }}</p>
        </div>

        <div class="mb-4">
            <h2 class="font-semibold text-gray-800 mb-2">Status</h2>
            @php
                $statusColors = [
                    'Geaccepteerd' => 'bg-green-100 text-green-700',
                    'Geweigerd' => 'bg-red-100 text-red-700',
                    'In behandeling' => 'bg-yellow-100 text-yellow-700',
                ];
            @endphp
            <span
                class="px-2 py-1 text-xs rounded-full {{ $statusColors[$reservation->status] ?? 'bg-gray-100 text-gray-700' }}">{{ $reservation->status }}</span>
        </div>

        <div class="flex gap-2 mt-4">
            @if($reservation->status === 'In behandeling')
                <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="Geaccepteerd">
                    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 flex items-center gap-1">
                        <i class="lucide lucide-check"></i> Accepteren
                    </button>
                </form>
                <form action="{{ route('admin.reservations.updateStatus', $reservation->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="status" value="Geweigerd">
                    <button class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 flex items-center gap-1">
                        <i class="lucide lucide-x"></i> Weigeren
                    </button>
                </form>
            @endif
            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST"
                onsubmit="return confirm('Weet je het zeker?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 flex items-center gap-1">
                    <i class="lucide lucide-trash-2"></i> Verwijderen
                </button>
            </form>
        </div>
    </div>
@endsection