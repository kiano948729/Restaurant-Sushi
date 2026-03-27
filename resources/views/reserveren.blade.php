@extends('layouts.app')

@section('content')
<div class="min-h-screen py-12 bg-[#0F0F0F]">
    <div class="container mx-auto px-4 md:px-6">

        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Tafel Reserveren
            </h1>
            <p class="text-white/60 max-w-2xl mx-auto">
                Reserveer uw tafel en geniet van een onvergetelijke culinaire ervaring
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 max-w-5xl mx-auto">

            <div class="bg-[#1a1a1a] border border-white/10 p-8 rounded-2xl shadow-lg">

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-500/20 text-green-400 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-6 p-4 bg-red-500/20 text-red-400 rounded-lg">
                        <ul class="text-sm space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>- {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h2 class="text-2xl font-bold text-white mb-6">
                    Reserveringsformulier
                </h2>

                <form action="{{ route('reservations.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label class="text-white">Naam *</label>
                        <input type="text" name="name" required
                            value="{{ old('name') }}"
                            class="w-full mt-2 p-3 rounded bg-[#0F0F0F] border border-white/10 text-white">
                    </div>

                    <div>
                        <label class="text-white">Email *</label>
                        <input type="email" name="email" required
                            value="{{ old('email') }}"
                            class="w-full mt-2 p-3 rounded bg-[#0F0F0F] border border-white/10 text-white">
                    </div>

                    <div>
                        <label class="text-white">Telefoon *</label>
                        <input type="tel" name="phone" required
                            value="{{ old('phone') }}"
                            pattern="[0-9+\s]+"
                            title="Alleen cijfers en eventueel + toegestaan"
                            class="w-full mt-2 p-3 rounded bg-[#0F0F0F] border border-white/10 text-white">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-white">Datum *</label>
                            <input type="date" name="date" required
                                min="{{ date('Y-m-d') }}"
                                value="{{ old('date') }}"
                                class="w-full mt-2 p-3 rounded bg-[#0F0F0F] border border-white/10 text-white">
                        </div>

                        <div>
                            <label class="text-white">Tijd *</label>
                            <input type="time" name="time" required
                                value="{{ old('time') }}"
                                class="w-full mt-2 p-3 rounded bg-[#0F0F0F] border border-white/10 text-white">
                        </div>
                    </div>

                    <div>
                        <label class="text-white">Aantal personen *</label>
                        <select name="guests" required
                            class="w-full mt-2 p-3 rounded bg-[#0F0F0F] border border-white/10 text-white">
                            @for($i = 1; $i <= 8; $i++)
                                <option value="{{ $i }}" {{ old('guests') == $i ? 'selected' : '' }}>
                                    {{ $i }} {{ $i === 1 ? 'persoon' : 'personen' }}
                                </option>
                            @endfor
                            <option value="9+">9+ personen (neem contact op)</option>
                        </select>
                    </div>

                    <button type="submit"
                        class="w-full bg-[#F5A623] text-[#0F0F0F] py-3 rounded-lg font-semibold hover:bg-[#F5A623]/90 transition">
                        Reservering Aanvragen
                    </button>

                    <p class="text-sm text-white/40 text-center">
                        * Verplichte velden
                    </p>
                </form>
            </div>

            <div class="space-y-6">

                <div class="bg-[#1a1a1a] border border-white/10 p-6 rounded-2xl">
                    <h3 class="text-lg font-semibold text-white mb-2">
                        Reserveringsbeleid
                    </h3>
                    <p class="text-white/70 text-sm">
                        Reserveringen worden bevestigd binnen 24 uur. Voor groepen groter 
                        dan 8 personen vragen wij u om telefonisch contact met ons op te nemen.
                    </p>
                </div>

                <div class="bg-[#1a1a1a] border border-white/10 p-6 rounded-2xl">
                    <h3 class="text-lg font-semibold text-white mb-2">
                        Openingstijden
                    </h3>
                    <div class="text-white/70 text-sm space-y-1">
                        <p>Maandag - Donderdag: 12:00 - 22:00</p>
                        <p>Vrijdag - Zaterdag: 12:00 - 23:00</p>
                        <p>Zondag: 13:00 - 21:00</p>
                    </div>
                </div>

                <div class="bg-[#1a1a1a] border border-white/10 p-6 rounded-2xl">
                    <h3 class="text-lg font-semibold text-white mb-2">
                        Groepsreserveringen
                    </h3>
                    <p class="text-white/70 text-sm">
                        Voor groepen vanaf 9 personen bieden wij speciale arrangementen aan. 
                        Neem contact met ons op voor de mogelijkheden.
                    </p>
                </div>

                <div class="bg-[#F5A623]/10 border border-[#F5A623]/30 p-4 rounded-xl">
                    <h3 class="text-[#F5A623] font-semibold mb-2">
                        Belangrijk
                    </h3>
                    <p class="text-white/70 text-sm">
                        Bij annulering vragen wij u dit minimaal 24 uur van tevoren door te geven.
                    </p>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection