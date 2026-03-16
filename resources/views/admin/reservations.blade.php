@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Reserveringen</h1>
    <p class="text-gray-600">Beheer tafelreserveringen</p>
</div>

<div class="bg-white border-gray-200 overflow-hidden rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr class="border-b border-gray-200">
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Naam</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Contact</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Datum</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Tijd</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Gasten</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Status</th>
                    <th class="text-right py-3 px-4 text-sm font-semibold text-gray-700">Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $res)
                    <tr class="border-b border-gray-100">
                        <td class="py-4 px-4 text-sm text-gray-900 font-medium">{{ $res->name }}</td>
                        <td class="py-4 px-4 text-sm text-gray-600">{{ $res->email }}<br><span class="text-xs text-gray-500">{{ $res->phone }}</span></td>
                        <td class="py-4 px-4 text-sm text-gray-900">{{ \Carbon\Carbon::parse($res->date)->format('d-m-Y') }}</td>
                        <td class="py-4 px-4 text-sm text-gray-900">{{ $res->time }}</td>
                        <td class="py-4 px-4 text-sm text-gray-900">{{ $res->guests }} {{ $res->guests === 1 ? 'persoon' : 'personen' }}</td>
                        <td class="py-4 px-4">
                            @php
                                $statusColors = [
                                    'Geaccepteerd' => 'bg-green-100 text-green-700',
                                    'Geweigerd' => 'bg-red-100 text-red-700',
                                    'In behandeling' => 'bg-yellow-100 text-yellow-700',
                                ];
                            @endphp
                            <span class="px-2 py-1 text-xs rounded-full {{ $statusColors[$res->status] ?? 'bg-gray-100 text-gray-700' }}">{{ $res->status }}</span>
                        </td>
                        <td class="py-4 px-4 flex justify-end gap-2">
                            @if($res->status === 'In behandeling')
                                <form action="{{ route('admin.reservations.updateStatus', $res->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Geaccepteerd">
                                    <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">Accepteren</button>
                                </form>
                                <form action="{{ route('admin.reservations.updateStatus', $res->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="Geweigerd">
                                    <button class="border border-red-600 text-red-600 px-3 py-1 rounded hover:bg-red-50">Weigeren</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection