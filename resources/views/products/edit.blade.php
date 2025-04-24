@extends('layouts.app')

@section('content')
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Produk') }}
        </h2>

    <div class="py-12 max-w-xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('products.update', $product) }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full border p-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Harga</label>
                <input type="number" name="price" value="{{ $product->price }}" class="w-full border p-2" required>
            </div>

            <div class="mb-4">
                <label class="block">Tanggal Terjual</label>
                <input type="date" name="sold_at" value="{{ $product->sold_at }}" class="w-full border p-2" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center bg-gray-300 text-gray-800 px-4 py-2 rounded h-10">Kembali</a>
        </form>
    </div>
    @endsection