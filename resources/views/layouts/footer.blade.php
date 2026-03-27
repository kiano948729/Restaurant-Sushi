<footer class="bg-[#1a1a1a] border-t border-white/10 mt-20">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">

            <div>
                <h3 class="text-[#F5A623] mb-4 text-xl font-semibold">Sushi Goya</h3>
                <p class="text-white/60 text-sm leading-relaxed">
                    Authentieke Japanse sushi ervaring in het hart van Nederland. 
                    Bereid met verse ingrediënten en passie voor perfectie.
                </p>
            </div>

            <div>
                <h4 class="text-white mb-4 font-semibold">Contact</h4>
                <div class="space-y-3 text-sm text-white/60">

                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-[#F5A623]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M21 10c0 7-9 11-9 11S3 17 3 10a9 9 0 1118 0z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        <span>Kalverstraat 123<br>1012 AB Amsterdam</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#F5A623]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 
                            19.79 19.79 0 01-8.63-3.07 
                            19.5 19.5 0 01-6-6 
                            19.79 19.79 0 01-3.07-8.67 
                            A2 2 0 014.11 2h3a2 2 0 012 1.72 
                            12.84 12.84 0 00.7 2.81 
                            2 2 0 01-.45 2.11L8.09 9.91 
                            a16 16 0 006 6l1.27-1.27 
                            a2 2 0 012.11-.45 
                            12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
                        </svg>
                        <span>+31 20 123 4567</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-[#F5A623]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M4 4h16v16H4z"/>
                            <path d="M22 6l-10 7L2 6"/>
                        </svg>
                        <span>info@sushigoya.nl</span>
                    </div>

                </div>
            </div>

            <div>
                <h4 class="text-white mb-4 font-semibold">Openingstijden</h4>
                <div class="flex items-start gap-3 text-sm text-white/60">
                    <svg class="w-5 h-5 text-[#F5A623]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/>
                        <polyline points="12 6 12 12 16 14"/>
                    </svg>
                    <div>
                        <p>Ma - Do: 12:00 - 22:00</p>
                        <p>Vr - Za: 12:00 - 23:00</p>
                        <p>Zondag: 13:00 - 21:00</p>
                    </div>
                </div>
            </div>

            <div>
                <h4 class="text-white mb-4 font-semibold">Navigatie</h4>
                <div class="space-y-2 text-sm">
                    <a href="{{ route('menu') }}" class="block text-white/60 hover:text-[#F5A623] transition">Menu</a>
                    <a href="{{ route('reserveren') }}" class="block text-white/60 hover:text-[#F5A623] transition">Reserveren</a>
                    <a href="{{ route('over-ons') }}" class="block text-white/60 hover:text-[#F5A623] transition">Over Ons</a>
                    <a href="{{ route('cart.index') }}" class="block text-white/60 hover:text-[#F5A623] transition">Winkelmand</a>
                </div>
            </div>

        </div>

        <div class="border-t border-white/10 mt-8 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-white/40 text-sm">
                © {{ date('Y') }} Sushi Goya. Alle rechten voorbehouden.
            </p>

            <div class="flex items-center gap-4">
                <a href="#" class="text-white/40 hover:text-[#F5A623] transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M18 2h3v20h-3V2zM3 2h3v20H3V2zm7 0h3v20h-3V2z"/>
                    </svg>
                </a>
                <a href="#" class="text-white/40 hover:text-[#F5A623] transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/>
                    </svg>
                </a>
                <a href="#" class="text-white/40 hover:text-[#F5A623] transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                        <polygon points="22 2 11 13 7 9 2 14 11 23 22 2"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>