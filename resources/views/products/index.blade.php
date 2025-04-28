@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Data Produk') }}
    </h2>

    <div class="py-12 mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('products.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Tambah Produk</a>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-2 text-left">#</th>
                        <th class="p-2 text-left">Nama Produk</th>
                        <th class="p-2 text-left">Kategori</th>
                        <th class="p-2 text-left">Stok</th>
                        <th class="p-2 text-left">Harga</th>
                        <th class="p-2 text-left">Tanggal Terjual</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr class="border-t">
                        <td class="p-2">{{ $loop->iteration }}</td>
                        <td class="p-2">{{ $product->name }}</td>
                        <td class="p-2">{{ $product->category->name ?? 'Tidak ada kategori' }}</td> <!-- Menampilkan nama kategori -->
                        <td class="p-2">{{ $product->stok }}</td>
                        <td class="p-2">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                        <td class="p-2">{{ $product->sold_at }}</td>
                        <td class="p-2 text-center">
                            <a href="{{ route('products.edit', $product) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a> 
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="return confirm('Hapus produk ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach                
                </tbody>
            </table>
        </div>
    </div>
@endsection
