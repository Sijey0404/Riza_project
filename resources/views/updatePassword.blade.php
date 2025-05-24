@extends('layout.layout1-plain')

@section('content')
<form method="POST" action="{{ route('updatePassword') }}" class="bg-white p-6 rounded shadow-md max-w-md w-full">
    @csrf
    <h2 class="text-2xl font-bold mb-4">Update Password</h2>

    @error('password')
        <p class="text-red-600 mb-2">{{ $message }}</p>
    @enderror

    <div class="relative mb-4">
        <input type="password" id="password" name="password" required placeholder="New Password" class="w-full border px-3 py-2 rounded">
        <button type="button" onclick="togglePasswordVisibility('password')" class="absolute right-3 top-2 text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </button>
    </div>
    
    <div class="relative mb-4">
        <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirm Password" class="w-full border px-3 py-2 rounded">
        <button type="button" onclick="togglePasswordVisibility('password_confirmation')" class="absolute right-3 top-2 text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
        </button>
    </div>

    <button type="submit" class="bg-black text-white px-4 py-2 rounded">Update Password</button>
</form>

<script>
function togglePasswordVisibility(fieldId) {
    const passwordInput = document.getElementById(fieldId);
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
    } else {
        passwordInput.type = 'password';
    }
}
</script>
@endsection
