@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">
    <div class="text-center mb-12">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Ons Menu</h1>
        <p class="text-white/60 max-w-2xl mx-auto">
            Verken onze selectie van authentieke Japanse gerechten,
            bereid met verse ingrediënten en traditionele technieken
        </p>
    </div>

    <div x-data="menuPage()" class="space-y-8">

        <div class="max-w-xl mx-auto">
            <div class="relative">
                <svg class="absolute left-4 top-1/2 -translate-y-1/2 h-5 w-5 text-white/40" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <input
                    type="text"
                    x-model="searchQuery"
                    placeholder="Zoek gerechten..."
                    class="pl-12 w-full bg-[#1a1a1a] border border-white/10 rounded h-12 text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-[#F5A623]"
                >
            </div>
        </div>

        <div class="flex flex-wrap justify-center gap-3">
            @php
                $categories = ['Alle', 'Sushi', 'Maki', 'Nigiri', 'Sashimi', 'Dranken'];
            @endphp
            @foreach($categories as $category)
            <button
                @click="selectedCategory = '{{ $category }}'"
                :class="selectedCategory === '{{ $category }}' ? 'bg-[#F5A623] text-[#0F0F0F]' : 'border border-white/20 text-white hover:bg-white/5'"
                class="px-4 py-2 rounded font-medium transition"
            >
                {{ $category }}
            </button>
            @endforeach
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($dishes as $dish)
                <div
                    x-show="(selectedCategory === 'Alle' || selectedCategory === '{{ $dish->category }}') && ('{{ strtolower($dish->name) }}'.includes(searchQuery.toLowerCase()) || '{{ strtolower($dish->description) }}'.includes(searchQuery.toLowerCase()))"
                    x-transition
                    class="bg-[#1a1a1a] border border-white/10 rounded-lg overflow-hidden shadow hover:shadow-lg transition"
                >
                    <img src="{{ $dish->image_url }}" alt="{{ $dish->name }}" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <div class="flex items-start justify-between mb-2">
                            <h3 class="text-xl font-semibold text-white">{{ $dish->name }}</h3>
                            <span class="text-xs px-2 py-1 rounded-full bg-[#F5A623]/20 text-[#F5A623]">{{ $dish->category }}</span>
                        </div>
                        <p class="text-white/60 mb-4 text-sm leading-relaxed">{{ $dish->description }}</p>
                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-[#F5A623]">€{{ number_format($dish->price, 2) }}</span>
                            <form action="{{ route('cart.add', $dish->id) }}" method="POST">
                                @csrf
                                <button class="bg-[#F5A623] text-[#0F0F0F] px-4 py-2 rounded hover:bg-[#F5A623]/90">
                                    Toevoegen
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div x-show="filteredCount() === 0" class="text-center py-20 text-white/60 text-lg">
            Geen gerechten gevonden. Probeer een andere zoekopdracht.
        </div>
    </div>
</div>

<script>
function menuPage() {
    return {
        searchQuery: '',
        selectedCategory: 'Alle',
        filteredCount() {
            const cards = document.querySelectorAll('[x-show]');
            let count = 0;
            cards.forEach(card => {
                if(card.style.display !== 'none') count++;
            });
            return count;
        }
    }
}
</script>
@endsection