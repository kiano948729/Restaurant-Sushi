@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Bestellingen</h1>
    <p class="text-gray-600">Overzicht van alle bestellingen</p>
</div>

<div class="bg-white border-gray-200 overflow-hidden rounded-lg shadow">
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr class="border-b border-gray-200">
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">ID</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Klant</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Items</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Totaal</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Datum/Tijd</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr class="border-b border-gray-100">
                        <td class="py-4 px-4 text-sm text-gray-900 font-medium">#{{ $order->id }}</td>
                        <td class="py-4 px-4 text-sm text-gray-900">{{ $order->customer }}</td>
                        <td class="py-4 px-4 text-sm text-gray-600">{{ $order->items->pluck('dish.name')->join(', ') }}</td>
                        <td class="py-4 px-4 text-sm font-semibold text-gray-900">€{{ number_format($order->total, 2) }}</td>
                        <td class="py-4 px-4 text-sm text-gray-600">{{ $order->created_at->format('d-m-Y H:i') }}</td>
                        <td class="py-4 px-4">
                            @php
                                $statusColors = [
                                    'Bezorgd' => 'bg-green-100 text-green-700',
                                    'Onderweg' => 'bg-blue-100 text-blue-700',
                                    'In behandeling' => 'bg-yellow-100 text-yellow-700',
                                    'In bereiding' => 'bg-orange-100 text-orange-700',
                                ];
                            @endphp
                            <span class="px-2 py-1 text-xs rounded-full {{ $statusColors[$order->status] ?? 'bg-gray-100 text-gray-700' }}">
                                {{ $order->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection