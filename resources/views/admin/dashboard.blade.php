@extends('layouts.admin')

@section('content')
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-900 mb-2">Dashboard</h1>
    <p class="text-gray-600">Welkom terug! Hier is een overzicht van uw restaurant.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    @php
        $stats = [
            ['label' => 'Gerechten', 'value' => $dishesCount, 'color' => 'bg-blue-500', 'icon' => 'utensils-crossed'],
            ['label' => 'Bestellingen', 'value' => $ordersCount, 'color' => 'bg-green-500', 'icon' => 'shopping-bag'],
            ['label' => 'Reserveringen', 'value' => $reservationsCount, 'color' => 'bg-purple-500', 'icon' => 'calendar'],
            ['label' => 'Berichten', 'value' => $messagesCount, 'color' => 'bg-orange-500', 'icon' => 'mail'],
        ];
    @endphp

    @foreach($stats as $stat)
        <div class="bg-white border-gray-200 p-6 rounded-lg shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 mb-1">{{ $stat['label'] }}</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stat['value'] }}</p>
                </div>
                <div class="{{ $stat['color'] }} w-12 h-12 rounded-lg flex items-center justify-center text-white">
                    <i class="lucide lucide-{{ $stat['icon'] }}"></i>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="bg-white border-gray-200 p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold text-gray-900 mb-4">Recente Bestellingen</h2>
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">ID</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Klant</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Items</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Totaal</th>
                    <th class="text-left py-3 px-4 text-sm font-semibold text-gray-700">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentOrders as $order)
                    <tr class="border-b border-gray-100">
                        <td class="py-3 px-4 text-sm text-gray-900">#{{ $order->id }}</td>
                        <td class="py-3 px-4 text-sm text-gray-900">{{ $order->customer }}</td>
                        <td class="py-3 px-4 text-sm text-gray-600">{{ $order->items->count() }} items</td>
                        <td class="py-3 px-4 text-sm text-gray-900">€{{ number_format($order->total, 2) }}</td>
                        <td class="py-3 px-4">
                            @php
                                $statusColors = [
                                    'Bezorgd' => 'bg-green-100 text-green-700',
                                    'Onderweg' => 'bg-blue-100 text-blue-700',
                                    'In behandeling' => 'bg-yellow-100 text-yellow-700',
                                    'In bereiding' => 'bg-orange-100 text-orange-700',
                                ];
                            @endphp
                            <span class="inline-flex px-2 py-1 text-xs rounded-full {{ $statusColors[$order->status] ?? 'bg-gray-100 text-gray-700' }}">
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