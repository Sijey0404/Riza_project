@extends('layout.layout1-plain')

@section('content')
<form action="{{ route('loginUser') }}" method="POST" class="bg-white p-10 rounded-xl shadow-lg w-full max-w-md">
    @csrf
    <h2 class="text-3xl font-bold text-center text-black mb-8">Login</h2>

    @if(session('message'))
        <p class="text-green-600 mb-4">{{ session('message') }}</p>
    @endif

    @error('error')
        <p class="text-red-600 mb-4">{{ $message }}</p>
    @enderror

    <label class="block mb-2 text-sm font-semibold text-gray-800">Username</label>
    <input type="text" name="username" class="w-full px-4 py-3 mb-6 border rounded" required>

    <label class="block mb-2 text-sm font-semibold text-gray-800">Password</label>
    <input type="password" name="password" class="w-full px-4 py-3 mb-6 border rounded" required>

    <input type="submit" value="Log in" class="w-full bg-black text-white py-3 rounded">

    <a href="{{ route('showNewUserForm') }}" class="block mt-4 text-center text-gray-700 hover:underline">Create Account</a>
</form>

@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

@if(session('message'))
    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded mb-4">
        {{ session('message') }}
    </div>
@endif

@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@endsection
