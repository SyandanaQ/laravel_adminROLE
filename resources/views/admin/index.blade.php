@extends('layouts.app')

@section('content')
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Tombol untuk Tambah Pengguna -->
                    <a href="{{ route('users.create') }}"
                        class="inline-block mb-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Tambah Pengguna Baru
                    </a>

                    <!-- Daftar Pengguna (Tabel) -->
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left">Nama</th>
                                <th class="px-4 py-2 text-left">Email</th>
                                <th class="px-4 py-2 text-left">Role</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-4 py-2">{{ $user->name }}</td>
                                    <td class="px-4 py-2">{{ $user->email }}</td>
                                    <td class="px-4 py-2">{{ $user->role }}</td>
                                    <td class="px-4 py-2">
                                        <!-- Tombol Edit dan Hapus -->
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                                        <form method="POST" action="{{ route('users.destroy', $user->id) }}"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                                                onclick="return confirm('Hapus pengguna ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection