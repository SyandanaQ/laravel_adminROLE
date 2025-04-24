<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-gray-800 text-white w-64 p-4">
            <h2 class="text-2xl font-bold mb-4">Admin Panel</h2>
            <ul class="space-y-4">
                <li>
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center text-white hover:bg-gray-700 px-4 py-2 rounded {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}" 
                       class="flex items-center text-white hover:bg-gray-700 px-4 py-2 rounded {{ request()->routeIs('products.index') ? 'bg-gray-700' : '' }}">
                        <i class="fas fa-boxes mr-3"></i>
                        Produk
                    </a>
                </li>

                @if (auth()->user() && auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('admin.index') }}" 
                       class="flex items-center text-white hover:bg-gray-700 px-4 py-2 rounded {{ request()->routeIs('admin.index') ? 'bg-gray-700' : '' }}">
                        <i class="fas fa-users mr-3"></i>
                        Admin
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}" 
                       class="flex items-center text-white hover:bg-gray-700 px-4 py-2 rounded {{ request()->routeIs('categories.index') ? 'bg-gray-700' : '' }}">
                        <i class="fas fa-tags mr-3"></i>
                        Kategori
                    </a>
                </li>
                @endif
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar -->
            <nav class="bg-white border-b border-gray-100 px-6 py-4 flex justify-between items-center">
                <div>
                    <span class="text-lg font-semibold text-gray-800">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center space-x-1 text-sm text-gray-600 hover:text-gray-800 focus:outline-none">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414L10 13.414l-4.707-4.707a1 1 0 010-1.414z"/>
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            </nav>

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
