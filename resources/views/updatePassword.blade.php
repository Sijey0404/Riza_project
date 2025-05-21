@extends('layout.layout1-plain')

@section('content')
<form method="POST" action="{{ route('updatePassword') }}" class="bg-white p-6 rounded shadow-md max-w-md w-full">
    @csrf
    <h2 class="text-2xl font-bold mb-4">Update Password</h2>

    @error('password')
        <p class="text-red-600 mb-2">{{ $message }}</p>
    @enderror

    <input type="password" name="password" required placeholder="New Password" class="w-full border px-3 py-2 rounded mb-4">
    <input type="password" name="password_confirmation" required placeholder="Confirm Password" class="w-full border px-3 py-2 rounded mb-4">

    <button type="submit" class="bg-black text-white px-4 py-2 rounded">Update Password</button>
</form>
@endsection
