@extends('layouts.app')

@section('content')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
        {{ __('Dashboard') }}
    </h2>

    <div class="bg-white p-6 rounded shadow">
        <p>Selamat datang, {{ Auth::user()->name }}!</p>
    </div>
@endsection
