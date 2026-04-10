@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center px-4">

        <div class="w-full max-w-md bg-[#1a1a1a] border border-white/10 rounded-2xl shadow-lg p-8">

            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-white mb-2">Wachtwoord vergeten</h1>
                <p class="text-white/60 text-sm">
                    Vul je e-mailadres in en we sturen je een link om je wachtwoord te resetten.
                </p>
            </div>

            <!-- Session Status -->
            @if(session('status'))
                <div class="mb-4 text-green-400 text-sm text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <label class="block text-sm text-white/70 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus
                        class="w-full bg-[#0F0F0F] border border-white/10 rounded px-4 h-11 text-white placeholder:text-white/40 focus:outline-none focus:ring-2 focus:ring-[#F5A623]">
                    @error('email')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Button -->
                <button type="submit"
                    class="w-full bg-[#F5A623] text-[#0F0F0F] font-semibold py-3 rounded hover:bg-[#F5A623]/90 transition">
                    Verstuur reset link
                </button>

                <!-- Back to login -->
                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-sm text-white/60 hover:text-white">
                        Terug naar inloggen
                    </a>
                </div>
            </form>

        </div>

    </div>
@endsection