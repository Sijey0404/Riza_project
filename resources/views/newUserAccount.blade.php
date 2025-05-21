@extends('layout.layout1-plain')

@section('content')
<form method="POST" action="{{ route('storeUser') }}" class="bg-white p-6 rounded shadow-md max-w-md w-full">
    @csrf
    <h2 class="text-2xl font-bold mb-4">Add New User</h2>

    @if(session('success'))
        <p class="text-green-600 mb-4">{{ session('success') }}</p>
    @endif

    @error('username')
        <p class="text-red-600">{{ $message }}</p>
    @enderror
    @error('defaultpassword')
        <p class="text-red-600">{{ $message }}</p>
    @enderror

    <label>Username:</label>
    <input type="text" name="username" required class="w-full border px-3 py-2 rounded mb-4">

    <label>Default Password:</label>
    <input type="text" name="defaultpassword" required class="w-full border px-3 py-2 rounded mb-4">

    <button type="submit" class="bg-black text-white px-4 py-2 rounded">Create User</button>
</form>
@endsection
