<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Restaurant Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://unpkg.com/lucide@latest"></script>

</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-gray-200 flex flex-col">

            <!-- Logo -->
            <div class="p-6 border-b border-gray-800">
                <h1 class="text-xl font-bold">
                    Sushi <span class="text-orange-400">Goya</span>
                </h1>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 p-4 space-y-2">

                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800' : '' }}">
                    <i data-lucide="layout-dashboard"></i>
                    Dashboard
                </a>

                <a href="{{ route('admin.dishes.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.dishes.*') ? 'bg-gray-800' : '' }}">
                    <i data-lucide="utensils"></i>
                    Gerechten
                </a>

                <a href="{{ route('admin.orders.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.orders.*') ? 'bg-gray-800' : '' }}">
                    <i data-lucide="shopping-bag"></i>
                    Bestellingen
                </a>

                <a href="{{ route('admin.reservations.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.reservations.*') ? 'bg-gray-800' : '' }}">
                    <i data-lucide="calendar"></i>
                    Reserveringen
                </a>

                <a href="{{ route('admin.messages.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.messages.*') ? 'bg-gray-800' : '' }}">
                    <i data-lucide="mail"></i>
                    Berichten
                </a>

                <a href="{{ route('admin.users.index') }}"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-gray-800 {{ request()->routeIs('admin.users.*') ? 'bg-gray-800' : '' }}">
                    <i data-lucide="user-plus"></i>
                    Medewerkers
                </a>
            </nav>

            <!-- User section -->
            <div class="p-4 border-t border-gray-800">

                <div class="text-sm mb-3 text-gray-400">
                    {{ auth()->user()->name }}
                </div>

                <a href="{{ route('home') }}"
                    class="flex items-center gap-2 text sm hover:text-white hover:bg-gray-800">
                    <i data-lucide="home"></i>
                    home
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="flex items-center gap-2 text-sm hover:text-white hover:bg-gray-800">
                        <i data-lucide="log-out"></i>
                        Logout
                    </button>
                </form>

            </div>

        </aside>


        <!-- Main Content -->
        <main class="flex-1 p-10">

            @yield('content')

        </main>

    </div>

    <script>
        lucide.createIcons();
    </script>

</body>

</html>