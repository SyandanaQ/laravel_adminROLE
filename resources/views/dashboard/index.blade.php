@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
        {{ __('Dashboard') }}
    </h2>

    <!-- CARD BAGIAN INI -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Card Jumlah Stok -->
        <div class="bg-white p-6 rounded shadow flex items-center justify-between">
            <div>
                <h2 class="text-gray-600 text-lg font-semibold">Total Stok Produk</h2>
                <p class="text-3xl font-bold text-blue-500 mt-2">{{ $totalStock }}</p>
            </div>
            <div>
                <svg class="w-12 h-12 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
            </div>
        </div>
    
        <!-- Card Jumlah User -->
        <div class="bg-white p-6 rounded shadow flex items-center justify-between">
            <div>
                <h2 class="text-gray-600 text-lg font-semibold">Total User</h2>
                <p class="text-3xl font-bold text-green-500 mt-2">{{ $totalUsers }}</p>
            </div>
            <div>
                <svg class="w-12 h-12 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20h5v-2a3 3 0 00-5.356-1.857M3 20h5v-2a3 3 0 00-5.356-1.857M3 7h18" />
                </svg>
            </div>
        </div>
    
        <!-- Card Total Harga Produk -->
        <div class="bg-white p-6 rounded shadow flex items-center justify-between">
            <div>
                <h2 class="text-gray-600 text-lg font-semibold">Total Penjualan</h2>
                <p class="text-3xl font-bold text-red-500 mt-2">Rp {{ $totalPrice }}</p>
            </div>
            <div>
                <svg class="w-12 h-12 text-red-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            </div>
        </div>
    </div>    
    <!-- CARD SAMPAI SINI -->

    <!-- CHART BAGIAN INI -->
    <div class="bg-white p-6 rounded shadow">
        @include('products.chart') {{-- Memanggil chart di sini --}}
    </div>
    <!-- CHART SAMPAI SINI -->
@endsection
