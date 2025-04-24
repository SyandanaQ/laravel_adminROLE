@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Daftar Kategori') }}
    </h2>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('categories.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mb-4 inline-block">+
            Tambah Kategori</a>

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
                        <th class="p-2 text-left">Nama Kategori</th>
                        <th class="p-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr class="border-t">
                            <td class="p-2">{{ $loop->iteration }}</td>
                            <td class="p-2">{{ $category->name }}</td>
                            <td class="p-2 text-center">
                                <a href="{{ route('categories.edit', $category) }}"
                                    class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                                        onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
@endsection
