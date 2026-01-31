@extends('user.layouts.app')

@section('title', 'Profile')

@section('content')
<div class="max-w-4xl mx-auto py-10">
    <h1 class="text-3xl font-bold mb-4">Profile Saya</h1>

    <div class="bg-white p-6 rounded-xl shadow">
        <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    </div>
</div>
@endsection
