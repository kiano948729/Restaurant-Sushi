@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[600px] md:h-[700px] flex items-center">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1489420716170-60870f8d5bd9?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxwcmVtaXVtJTIwc3VzaGklMjBwbGF0dGVyfGVufDF8fHx8MTc3MjE3Nzc3OXww&ixlib=rb-4.1.0&q=80&w=1080"
                alt="Premium Sushi" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0F0F0F]/90 to-[#0F0F0F]/60"></div>
        </div>
        <div class="container mx-auto px-4 md:px-6 relative z-10">
            <div class="max-w-2xl">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold text-white mb-6 leading-tight">
                    Authentieke Japanse <span class="text-[#F5A623]">Sushi Ervaring</span>
                </h1>
                <p class="text-lg md:text-xl text-white/80 mb-8 leading-relaxed">
                    Ontdek de kunst van traditionele Japanse keuken, bereid met verse ingrediënten
                    en geserveerd met passie voor perfectie.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('menu') }}">
                        <button
                            class="bg-[#F5A623] text-[#0F0F0F] px-6 py-3 rounded hover:bg-[#F5A623]/90 w-full sm:w-auto flex items-center gap-2">
                            Bekijk Menu
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </button>
                    </a>
                    <a href="{{ route('reserveren') }}">
                        <button class="border border-white text-white px-6 py-3 rounded hover:bg-white/10 w-full sm:w-auto">
                            Reserveer Tafel
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-16 bg-[#1a1a1a]">
        <div class="container mx-auto px-4 md:px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-[#F5A623]/20 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-[#F5A623]" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl text-white mb-2">Premium Kwaliteit</h3>
                    <p class="text-white/60">Alleen de beste en verse ingrediënten voor onze gerechten</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-[#F5A623]/20 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-[#F5A623]" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 2l3 6 6 .5-4.5 4 1 6-5-3-5 3 1-6-4.5-4L9 8 12 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl text-white mb-2">Authentieke Recepten</h3>
                    <p class="text-white/60">Traditionele Japanse bereidingswijzen van topchefs</p>
                </div>
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full bg-[#F5A623]/20 flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-[#F5A623]" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl text-white mb-2">Snelle Levering</h3>
                    <p class="text-white/60">Bestel online en ontvang binnen 30-45 minuten</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Dishes -->
    <section class="py-20">
        <div class="container mx-auto px-4 md:px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Onze Specialiteiten</h2>
                <p class="text-white/60 max-w-2xl mx-auto">
                    Proef onze meest populaire gerechten, met zorg bereid door onze ervaren sushi chefs
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($featuredDishes as $dish)
                    <div
                        class="bg-[#1a1a1a] border-white/10 overflow-hidden rounded-lg shadow group hover:border-[#F5A623]/50 transition-all">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="{{ $dish->image_url }}" alt="{{ $dish->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-white mb-2">{{ $dish->name }}</h3>
                            <p class="text-white/60 mb-4 text-sm">{{ $dish->description }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-2xl font-bold text-[#F5A623]">€{{ number_format($dish->price, 2) }}</span>
                                <form action="{{ route('cart.add', $dish->id) }}" method="POST">
                                    @csrf
                                    <button
                                        class="bg-[#F5A623] text-[#0F0F0F] px-4 py-2 rounded hover:bg-[#F5A623]/90">Toevoegen</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('menu') }}">
                    <button class="border-[#F5A623] text-[#F5A623] px-6 py-3 rounded hover:bg-[#F5A623]/10">Bekijk Volledige
                        Menu</button>
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-20 bg-[#1a1a1a]">
        <div class="container mx-auto px-4 md:px-6 grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Over Sushi Goya</h2>
                <p class="text-white/70 mb-6 leading-relaxed">
                    Al meer dan 15 jaar brengen wij de authentieke smaken van Japan naar Amsterdam.
                    Onze chefs zijn opgeleid in de traditionele kunst van sushi maken en gebruiken
                    alleen de verse ingrediënten van de hoogste kwaliteit.
                </p>
                <p class="text-white/70 mb-8 leading-relaxed">
                    Bij Sushi Goya draait alles om perfectie, van de selectie van vis tot de presentatie op uw bord.
                    Elke hap vertelt een verhaal van vakmanschap en passie.
                </p>
                <a href="{{ route('over-ons') }}"
                    class="border border-[#F5A623] text-[#F5A623] px-6 py-3 rounded hover:bg-[#F5A623]/10">Lees Meer Over
                    Ons</a>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <img src="https://source.unsplash.com/400x400/?sushi,fresh" alt="Fresh Sushi"
                    class="w-full aspect-square object-cover rounded-lg">
                <img src="https://source.unsplash.com/400x400/?japanese,food" alt="Japanese Food"
                    class="w-full aspect-square object-cover rounded-lg">
                <img src="https://images.unsplash.com/photo-1562560471-cb5b5f96c1ab?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=1080"
                    alt="Interior" class="w-full aspect-square object-cover rounded-lg">
                <img src="https://images.unsplash.com/photo-1730324772289-b00b3cfbd374?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&w=1080"
                    alt="Chef" class="w-full aspect-square object-cover rounded-lg">
            </div>
        </div>
    </section>

    <div x-data="reviewSlider()" x-init="init({{ count($reviews) }})" @mouseenter="pause()" @mouseleave="start()"
        class="relative max-w-6xl mx-auto overflow-hidden">

        <!-- Slider -->
        <div class="flex transition-transform duration-700" :style="'transform: translateX(-' + (current * 33.333) + '%)'">
            @foreach($reviews as $review)
                <div class="w-1/3 flex-shrink-0 px-4">
                    <div class="bg-[#1a1a1a] border border-white/10 rounded-lg p-6 h-full">

                        <!-- Sterren -->
                        <div class="flex gap-1 mb-3">
                            @for($i = 0; $i < $review->rating; $i++)
                                <svg class="h-5 w-5 text-[#F5A623] fill-current" viewBox="0 0 24 24">
                                    <path
                                        d="M12 .587l3.668 7.568L24 9.423l-6 5.853L19.336 24 12 20.201 4.664 24 6 15.276 0 9.423l8.332-1.268L12 .587z" />
                                </svg>
                            @endfor
                        </div>

                        <p class="text-white/70 text-sm mb-4 italic">
                            "{{ $review->message }}"
                        </p>

                        <h4 class="text-white font-semibold text-sm">
                            {{ $review->name }}
                        </h4>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- Knoppen -->
        <button @click="prev()" class="absolute left-0 top-1/2 -translate-y-1/2 bg-black/50 px-3 py-2 text-white">
            <
        </button>

        <button @click="next()" class="absolute right-0 top-1/2 -translate-y-1/2 bg-black/50 px-3 py-2 text-white">
            >
        </button>

    </div>

    <div class="text-center mb-10">
        <button onclick="document.getElementById('reviewForm').classList.toggle('hidden')"
            class="bg-[#F5A623] text-[#0F0F0F] px-6 py-3 rounded hover:bg-[#F5A623]/90">
            Laat een review achter
        </button>
    </div>

    <div id="reviewForm" class="hidden max-w-xl mx-auto bg-[#1a1a1a] p-6 rounded-lg border border-white/10 mb-12">
        <form method="POST" action="{{ route('message.store') }}" class="space-y-4">
            @csrf

            <input name="name" placeholder="Naam" class="w-full p-3 bg-[#0F0F0F] text-white border border-white/10 rounded">

            <input name="email" type="email" placeholder="Email"
                class="w-full p-3 bg-[#0F0F0F] text-white border border-white/10 rounded">

            <textarea name="message" placeholder="Jouw review..."
                class="w-full p-3 bg-[#0F0F0F] text-white border border-white/10 rounded"></textarea>

            <div x-data="{ rating: 5, hover: 0 }" class="space-y-2">

                <input type="hidden" name="rating" :value="rating">

                <div class="flex gap-2 cursor-pointer">
                    <template x-for="star in 5" :key="star">
                        <svg @click="rating = star" @mouseover="hover = star" @mouseleave="hover = 0"
                            :class="(hover ? star <= hover : star <= rating) ? 'text-[#F5A623]' : 'text-white/20'"
                            class="w-7 h-7 transition" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 .587l3.668 7.568L24 9.423l-6 5.853L19.336 24 12 20.201 4.664 24 6 15.276 0 9.423l8.332-1.268L12 .587z" />
                        </svg>
                    </template>
                </div>

            </div>

            <button class="w-full bg-[#F5A623] text-[#0F0F0F] py-3 rounded">
                Verstuur review
            </button>
        </form>
    </div>
@endsection