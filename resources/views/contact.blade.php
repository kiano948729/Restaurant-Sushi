@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Contact</h1>
            <p class="text-white/60 max-w-2xl mx-auto">
                Heb je vragen of opmerkingen? Vul het formulier hieronder in of kom langs!
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-5xl mx-auto">

            <!-- Contact Form -->
            <div>
                <div class="bg-[#1a1a1a] border-white/10 p-8 rounded-lg shadow relative">

                    <!-- Toast -->
                    @if(session('success'))
                        <div class="bg-green-500 text-white p-4 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h2 class="text-2xl font-bold text-white mb-6">Stuur ons een bericht</h2>
                    <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="naam" class="block text-white mb-2">Naam *</label>
                            <input type="text" id="naam" name="naam" value="{{ old('naam') }}" required
                                class="w-full bg-[#0F0F0F] border border-white/10 text-white p-3 rounded"
                                placeholder="Uw naam">
                            @error('naam') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-white mb-2">Email *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                                class="w-full bg-[#0F0F0F] border border-white/10 text-white p-3 rounded"
                                placeholder="uw@email.nl">
                            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="onderwerp" class="block text-white mb-2">Onderwerp *</label>
                            <input type="text" id="onderwerp" name="onderwerp" value="{{ old('onderwerp') }}" required
                                class="w-full bg-[#0F0F0F] border border-white/10 text-white p-3 rounded"
                                placeholder="Onderwerp">
                            @error('onderwerp') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label for="bericht" class="block text-white mb-2">Bericht *</label>
                            <textarea id="bericht" name="bericht" rows="5" required
                                class="w-full bg-[#0F0F0F] border border-white/10 text-white p-3 rounded"
                                placeholder="Typ hier uw bericht">{{ old('bericht') }}</textarea>
                            @error('bericht') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="w-full bg-[#F5A623] text-[#0F0F0F] p-3 rounded hover:bg-[#F5A623]/90">
                            Verstuur
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Info & Map -->
            <div class="space-y-6">
                <!-- Adres -->
                <div class="bg-[#1a1a1a] border-white/10 p-6 rounded-lg flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#F5A623]/20 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#F5A623]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 11c1.38 0 2.5-1.12 2.5-2.5S13.38 6 12 6 9.5 7.12 9.5 8.5 10.62 11 12 11z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 21s-6-7-6-11a6 6 0 1112 0c0 4-6 11-6 11z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">Adres</h3>
                        <p class="text-white/70 text-sm">Kalverstraat 123, 1012 AB Amsterdam</p>
                    </div>
                </div>

                <!-- Telefoon -->
                <div class="bg-[#1a1a1a] border-white/10 p-6 rounded-lg flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#F5A623]/20 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#F5A623]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5h2l2 7 3-3 7 2 1 5-5 1-2-2-3 3-7-2 1-5z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">Telefoon</h3>
                        <p class="text-white/70 text-sm">+31 20 123 4567</p>
                    </div>
                </div>

                <!-- Email -->
                <div class="bg-[#1a1a1a] border-white/10 p-6 rounded-lg flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full bg-[#F5A623]/20 flex items-center justify-center flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#F5A623]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 12H8m0 0l4-4m0 0l4 4m-4-4v8" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-white mb-1">Email</h3>
                        <p class="text-white/70 text-sm">info@sushigoya.nl</p>
                    </div>
                </div>

                <!-- Map -->
                <div class="bg-[#1a1a1a] border-white/10 p-6 rounded-lg">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.123456!2d4.891!3d52.369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c609123456789%3A0xabcdef123456789!2sKalverstraat%20123%2C%201012%20AB%20Amsterdam!5e0!3m2!1sen!2snl!4v1699999999999!5m2!1sen!2snl"
                        width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        class="rounded-lg"></iframe>
                </div>

            </div>
        </div>
    </div>
@endsection