@extends('../layouts.admin')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Bericht van {{ $message->name }}</h1>
            <p class="text-gray-600">Details van het contactbericht</p>
        </div>
        <a href="{{ route('admin.messages.index') }}"
            class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 flex items-center gap-2">
            <i class="lucide lucide-arrow-left"></i> Terug
        </a>
    </div>

    <div class="bg-white border-gray-200 rounded-lg shadow p-6">
        <div class="mb-4">
            <p><strong>Naam:</strong> {{ $message->name }}</p>
            <p><strong>Email:</strong> {{ $message->email }}</p>
            <p><strong>Telefoon:</strong> {{ $message->phone ?? '-' }}</p>
            <p><strong>Datum:</strong> {{ $message->created_at ? $message->created_at->format('d-m-Y H:i') : '-' }}</p>
        </div>

        <div class="mb-4">
            <h2 class="font-semibold text-gray-800 mb-2">Bericht</h2>
            <p class="text-gray-700">{{ $message->message }}</p>
        </div>

        <div class="flex gap-2 mt-4">
            @if(!$message->read)
                <form action="{{ route('admin.messages.markRead', $message->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 flex items-center gap-1">
                        <i class="lucide lucide-check"></i> Markeer als gelezen
                    </button>
                </form>
            @endif

            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST"
                onsubmit="return confirm('Weet je het zeker dat je dit bericht wilt verwijderen?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 flex items-center gap-1">
                    <i class="lucide lucide-trash-2"></i> Verwijderen
                </button>
            </form>
        </div>
    </div>
@endsection