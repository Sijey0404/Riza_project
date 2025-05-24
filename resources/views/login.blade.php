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
    <div class="relative">
        <input type="password" name="password" id="password" value="Changepass123" class="w-full px-4 py-3 mb-6 border rounded" required>
        <button type="button" onclick="togglePasswordVisibility()" class="absolute right-3 top-3 text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </button>
    </div>

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

<script>
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
}
</script>
@endsection
