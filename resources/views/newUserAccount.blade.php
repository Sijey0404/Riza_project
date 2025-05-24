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
    <div class="relative mb-4">
        <input type="text" name="defaultpassword" value="Changepass123" readonly class="w-full border px-3 py-2 rounded bg-gray-100">
        <div class="absolute right-3 top-2 text-xs text-gray-500">
            Default system password
        </div>
    </div>

    <p class="text-sm text-gray-600 mb-4">User will be prompted to change this password after first login.</p>

    <button type="submit" class="bg-black text-white px-4 py-2 rounded">Create User</button>
</form>
@endsection
