@extends('layouts.app')

@section('content')
    <h2>Edit Kategori</h2>
    <form method="POST" action="{{ route('categories.update', $category) }}" class="mt-4">
        @csrf
        @method('PUT')
        <label>Nama Kategori</label>
        <input type="text" name="name" value="{{ $category->name }}" class="border p-2 w-full" required>
        <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
@endsection
