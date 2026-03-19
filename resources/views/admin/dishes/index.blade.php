@extends('../layouts.admin')

@section('content')
<div class="mb-8 flex items-center justify-between">
    <div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Gerechten Beheer</h1>
        <p class="text-gray-600">Beheer uw menukaart</p>
    </div>
    <a href="{{ route('admin.dishes.create') }}" class="bg-[#F5A623] text-white px-4 py-2 rounded hover:bg-[#F5A623]/90 flex items-center gap-2">
        <i class="lucide lucide-plus"></i> Nieuw Gerecht
    </a>
</div>

<!-- Table -->
<div class="bg-white border-gray-200 overflow-hidden rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr class="border-b border-gray-200">
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Naam</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Categorie</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Omschrijving</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Prijs</th>
                    <th class="text-right py-3 px-4 text-sm font-semibold text-gray-700">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dishes as $dish)
                    <tr class="border-b border-gray-100">
                        <td class="py-4 px-4 text-sm text-gray-900">{{ $dish->name }}</td>
                        <td class="py-4 px-4">
                            <span class="inline-flex px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-700">{{ $dish->category }}</span>
                        </td>
                        <td class="py-4 px-4 text-sm text-gray-600 max-w-xs truncate">{{ $dish->description }}</td>
                        <td class="py-4 px-4 text-sm font-semibold text-gray-900">€{{ number_format($dish->price, 2) }}</td>
                        <td class="py-4 px-4 text-right flex justify-end gap-2">
                            <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="text-blue-600 hover:text-blue-700 hover:bg-blue-50 p-2 rounded">
                                <h1>edit</h1>
                            </a>
                            <form action="{{ route('admin.dishes.destroy', $dish->id) }}" method="POST" onsubmit="return confirm('Weet je het zeker?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-700 hover:bg-red-50 p-2 rounded">
                                    <h1>delete</h1>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
