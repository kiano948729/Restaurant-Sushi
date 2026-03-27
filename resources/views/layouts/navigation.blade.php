<nav x-data="{ open: false }" class="bg-[#0F0F0F] border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center space-x-8">
                <div class="shrink-0">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-[#F5A623]" />
                    </a>
                </div>
                <div class="hidden sm:flex space-x-4">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-white hover:text-[#F5A623]">Home</x-nav-link>
                    <x-nav-link :href="route('menu')" :active="request()->routeIs('menu')" class="text-white hover:text-[#F5A623]">Menu</x-nav-link>
                    <x-nav-link :href="route('reserveren')" :active="request()->routeIs('reserveren')" class="text-white hover:text-[#F5A623]">Reserveer</x-nav-link>
                    <x-nav-link :href="route('over-ons')" :active="request()->routeIs('over-ons')" class="text-white hover:text-[#F5A623]">Over Ons</x-nav-link>
                    <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="text-white hover:text-[#F5A623]">Contact</x-nav-link>
                    <x-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')" class="text-white hover:text-[#F5A623] relative">
                        Winkelmand
                        @if(session('cart') && count(session('cart')) > 0)
                        <span class="absolute -top-2 -right-2 bg-[#F5A623] text-[#0F0F0F] px-2 py-1 rounded-full text-xs font-bold">
                            {{ count(session('cart')) }}
                        </span>
                        @endif
                    </x-nav-link>
                </div>
            </div>

            @auth
            <div class="hidden sm:flex sm:items-center sm:space-x-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 rounded-md text-sm font-medium text-white bg-[#1a1a1a] hover:bg-[#F5A623] hover:text-[#0F0F0F] transition">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-1 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
            @endauth

            <div class="sm:hidden -mr-2 flex items-center">
                <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-[#F5A623] hover:bg-white/10 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden bg-[#0F0F0F] border-t border-white/10">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" class="text-white hover:text-[#F5A623]">Home</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('menu')" :active="request()->routeIs('menu')" class="text-white hover:text-[#F5A623]">Menu</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('reserveren')" :active="request()->routeIs('reserveren')" class="text-white hover:text-[#F5A623]">Reserveer</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('over-ons')" :active="request()->routeIs('over-ons')" class="text-white hover:text-[#F5A623]">Over Ons</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')" class="text-white hover:text-[#F5A623]">Contact</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')" class="text-white hover:text-[#F5A623] relative">
                Winkelmand
                @if(session('cart') && count(session('cart')) > 0)
                <span class="ml-1 bg-[#F5A623] text-[#0F0F0F] px-2 rounded-full text-xs font-bold">{{ count(session('cart')) }}</span>
                @endif
            </x-responsive-nav-link>
        </div>

        @auth
        <div class="pt-4 pb-1 border-t border-white/10 px-4">
            <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
            <div class="font-medium text-sm text-white/60">{{ Auth::user()->email }}</div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="text-white hover:text-[#F5A623]">Profile</x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" class="text-white hover:text-[#F5A623]" onclick="event.preventDefault(); this.closest('form').submit();">Log Out</x-responsive-nav-link>
                </form>
            </div>
        </div>
        @endauth
    </div>
</nav>