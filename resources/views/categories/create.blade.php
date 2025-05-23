@extends('layouts.app')

@section('content')
    <h2>Tambah Kategori</h2>
    <form method="POST" action="{{ route('categories.store') }}" class="mt-4">
        @csrf
        <label>Nama Kategori</label>
        <input type="text" name="name" class="border p-2 w-full" required>
        <button type="submit" class="mt-2 bg-green-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('categories.index') }}" class="inline-flex items-center justify-center bg-gray-300 text-gray-800 px-4 py-2 rounded h-10">Kembali</a>

    </form>
@endsection
