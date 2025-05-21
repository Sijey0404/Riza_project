<!-- resources/views/maintenance.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>System Maintenance</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 flex items-center justify-center min-h-screen">

    <div class="bg-white p-12 rounded-2xl shadow-xl text-center max-w-lg w-full">
        <!-- Icon Section -->
        <div class="mb-6">
            <svg class="mx-auto h-24 w-24 text-yellow-500 animate-spin" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 1010 10A10.011 10.011 0 0012 2z"/>
            </svg>
        </div>

        <!-- Title -->
        <h1 class="text-3xl font-extrabold text-gray-800 mb-2">System Under Maintenance</h1>
        <p class="text-lg text-gray-600 mb-4">Our system is currently undergoing scheduled maintenance. We’ll be back online shortly!</p>
        
        <!-- Maintenance Message -->
        <div class="bg-yellow-100 text-yellow-600 p-4 rounded-lg mb-6">
            <p class="text-lg">We expect to be back up in 30 minutes. Thanks for your patience!</p>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-center space-x-4">
            <a href="#" class="inline-block bg-yellow-500 text-white px-6 py-3 rounded-lg shadow hover:bg-yellow-600 transition transform hover:scale-105">Refresh</a>
            <a href="/" class="inline-block bg-gray-600 text-white px-6 py-3 rounded-lg shadow hover:bg-gray-700 transition transform hover:scale-105">Go to Homepage</a>
        </div>
    </div>

</body>
</html>
