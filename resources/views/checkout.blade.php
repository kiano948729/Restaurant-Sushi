@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold text-white mb-6">Afrekenen</h1>

        @if(session('error'))
            <div class="bg-red-600 text-white p-4 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-[#1a1a1a] p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-white mb-4">Je Winkelwagen</h2>
                @if(empty($cart))
                    <p class="text-white/60">Je winkelwagen is leeg.</p>
                @else
                    <ul class="divide-y divide-gray-700">
                        @php $total = 0; @endphp
                        @foreach($cart as $item)
                            <li class="py-4 flex justify-between items-center">
                                <div>
                                    <p class="text-white font-semibold">{{ $item['name'] }}</p>
                                    <p class="text-white/60">Aantal: {{ $item['quantity'] }}</p>
                                </div>
                                <span
                                    class="text-[#F5A623] font-bold">€{{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                                @php $total += $item['price'] * $item['quantity']; @endphp
                            </li>
                        @endforeach
                    </ul>
                    <div class="mt-4 text-right">
                        <p class="text-white font-bold text-lg">Totaal: €{{ number_format($total, 2) }}</p>
                    </div>
                @endif
            </div>

            {{-- Checkout formulier --}}
            <div class="bg-[#1a1a1a] p-6 rounded-lg shadow">
                <h2 class="text-xl font-semibold text-white mb-4">Jouw Gegevens</h2>

                <form action="{{ route('checkout.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-white mb-1" for="customer_name">Naam</label>
                        <input type="text" name="customer_name" id="customer_name" value="{{ old('customer_name') }}"
                            class="w-full p-2 rounded bg-gray-800 text-white @error('customer_name') border-red-500 @enderror">
                        @error('customer_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-white mb-1" for="customer_email">Email</label>
                        <input type="email" name="customer_email" id="customer_email" value="{{ old('customer_email') }}"
                            class="w-full p-2 rounded bg-gray-800 text-white @error('customer_email') border-red-500 @enderror">
                        @error('customer_email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-white mb-1" for="customer_phone">Telefoon</label>
                        <input type="text" name="customer_phone" id="customer_phone" value="{{ old('customer_phone') }}"
                            class="w-full p-2 rounded bg-gray-800 text-white @error('customer_phone') border-red-500 @enderror">
                        @error('customer_phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="w-full bg-[#F5A623] text-[#0F0F0F] py-3 rounded hover:bg-[#F5A623]/90 mt-4 font-bold">
                        Plaats Bestelling
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection