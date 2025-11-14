<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.links.main')
    <title>AdminWarung - Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full mx-4">
        <!-- Logo dan Judul -->
        <div class="text-center mb-8">
            <div class="mx-auto h-16 w-16 bg-blue-600 rounded-full flex items-center justify-center mb-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-800">AdminWarung</h1>
            <p class="text-gray-600 mt-2">Masuk ke akun Anda</p>
        </div>

        <!-- Form Login -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <form id="loginForm">
                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" id="email"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="nama@contoh.com" required>
                </div>

                <!-- Password Input -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                    <input type="password" id="password"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder="Masukkan password" required>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember"
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                    </div>
                    <a href="#" class="text-sm text-blue-600 hover:text-blue-500">Lupa password?</a>
                </div>

                <!-- Submit Button -->
                <button type="submit" id="loginButton"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200 flex items-center justify-center">
                    <span id="buttonText">Masuk</span>
                </button>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                &copy; 2023 AdminWarung. All rights reserved.
            </p>
        </div>
    </div>

</body>

</html>
