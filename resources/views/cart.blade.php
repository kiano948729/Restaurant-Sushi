@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-white mb-8">Je Winkelwagen</h1>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(!$cart || count($cart) === 0)
            <div class="text-center py-20">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-24 w-24 text-white/20 mb-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.5 6H19m-12-6v6m6-6v6" />
                </svg>
                <h2 class="text-3xl font-bold text-white mb-4">Winkelwagen is leeg</h2>
                <p class="text-white/60 mb-8">Voeg heerlijke gerechten toe om te beginnen</p>
                <a href="{{ route('menu') }}"
                    class="inline-block bg-[#F5A623] text-[#0F0F0F] px-6 py-3 rounded hover:bg-[#F5A623]/90 transition">
                    Bekijk Menu
                </a>
            </div>
        @else
            @php $grandTotal = 0; @endphp

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-4">
                    @foreach($cart as $id => $item)
                        @php $total = $item['price'] * $item['quantity'];
                        $grandTotal += $total; @endphp
                        <div class="bg-[#1a1a1a] border border-white/10 rounded-lg p-4 flex gap-4 items-center">
                            @if($item['image'])
                                <div class="w-24 h-24 rounded-lg overflow-hidden flex-shrink-0">
                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                </div>
                            @endif
                            <div class="flex-1 min-w-0">
                                <h3 class="text-xl font-semibold text-white">{{ $item['name'] }}</h3>
                                <p class="text-white/60 text-sm mb-2">{{ $item['description'] }}</p>
                                <p class="text-[#F5A623] font-bold text-lg">€{{ number_format($item['price'], 2) }}</p>
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="mt-3 flex items-center gap-2">
                                    @csrf
                                    <button type="submit" name="quantity" value="{{ max(1, $item['quantity'] - 1) }}"
                                        class="w-9 h-9 flex items-center justify-center rounded border border-white/20 text-white hover:bg-white/5">-</button>
                                    <span class="text-white font-semibold w-8 text-center">{{ $item['quantity'] }}</span>
                                    <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}"
                                        class="w-9 h-9 flex items-center justify-center rounded border border-white/20 text-white hover:bg-white/5">+</button>
                                    <button type="submit" formaction="{{ route('cart.remove', $id) }}"
                                        class="ml-auto text-red-500 hover:text-red-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="text-white font-semibold text-right text-lg">€{{ number_format($total, 2) }}</div>
                        </div>
                    @endforeach
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-[#1a1a1a] border border-white/10 rounded-lg p-6 sticky top-24 space-y-4">
                        <h2 class="text-2xl font-bold text-white mb-4">Totaal</h2>
                        <div class="flex justify-between text-white/80">
                            <span>Subtotaal</span>
                            <span>€{{ number_format($grandTotal, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-white/80">
                            <span>Bezorgkosten</span>
                            @php $deliveryFee = $grandTotal > 0 ? 2.50 : 0; @endphp
                            <span>€{{ number_format($deliveryFee, 2) }}</span>
                        </div>
                        <div class="border-t border-white/10 pt-3 flex justify-between text-xl font-bold text-white">
                            <span>Totaal</span>
                            <span class="text-[#F5A623]">€{{ number_format($grandTotal + $deliveryFee, 2) }}</span>
                        </div>

                        <a href="{{ route('checkout') }}"
                            class="w-full block text-center bg-[#F5A623] text-[#0F0F0F] py-3 rounded hover:bg-[#F5A623]/90 transition mt-4">
                            Naar Afrekenen
                        </a>
                        <a href="{{ route('menu') }}"
                            class="w-full block text-center bg-white/10 text-white py-3 rounded hover:bg-white/20 transition mt-2">
                            Verder winkelen
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection