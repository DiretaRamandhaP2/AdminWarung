<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminWarung</title>
    {{-- font awosome --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6/css/all.min.css" />
    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- Tailwind --}}
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<style type="text/tailwindcss">
    @theme {
        --color-blue-primary: #6892D5;
        --color-green-dark-primary: #79D1C3;
        --color-green-light-primary: #C9FDD7;
        --color-white-primary: #F8FCFB;
    }
</style>
<body class="bg-white-primary font-sans antialiased">
    @include('sweetalert::alert')
    <section id="main" class="min-h-screen flex items-center justify-center p-4">
        <div
            class="flex flex-col md:flex-row bg-white rounded-3xl shadow-2xl overflow-hidden max-w-4xl w-full border border-green-light-primary/30">

            <div
                class="hidden md:flex md:w-1/2 bg-linear-to-br from-blue-primary to-green-dark-primary p-12 flex-col justify-between text-white">
                <div>
                    <div class="flex items-center gap-2 mb-8">
                        <i class="fa-solid fa-shop text-3xl"></i>
                        <span class="text-2xl font-bold tracking-tight">AdminWarung</span>
                    </div>
                    <h2 class="text-4xl font-extrabold leading-tight mb-4">Kelola Warung Jadi Lebih Mudah.</h2>
                    <p class="text-blue-50 opacity-90">Masuk untuk memantau stok barang, laporan penjualan, dan kelola
                        karyawan dalam satu dasbor terpadu.</p>
                </div>
                <div class="text-sm opacity-75">
                    &copy; 2026 AdminWarung Ecosystem
                </div>
            </div>

            <div class="w-full md:w-1/2 p-8 md:p-12 bg-white">
                <div class="mb-10 text-center md:text-left">
                    <h2 class="text-3xl font-bold text-gray-800">Selamat Datang!</h2>
                    <p class="text-gray-500 mt-2">Silakan masuk ke akun Anda</p>
                </div>

                <form action="{{ route('authecation') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="flex flex-col gap-2">
                        <label for="username" class="text-sm font-semibold text-gray-700 ml-1">Username</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <input type="text" id="username" name="username" placeholder="admin_warung" required
                                class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-blue-primary focus:ring-4 focus:ring-blue-primary/10 transition-all outline-none">
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between items-center px-1">
                            <label for="password" class="text-sm font-semibold text-gray-700">Password</label>
                            <a href="#" class="text-xs text-blue-primary font-bold hover:underline">Lupa
                                Password?</a>
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                <i class="fa-solid fa-lock"></i>
                            </span>
                            <input type="password" id="password" name="password" placeholder="••••••••" required
                                class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 focus:border-blue-primary focus:ring-4 focus:ring-blue-primary/10 transition-all outline-none">
                        </div>
                    </div>

                    <div class="flex items-center gap-2 px-1">
                        <input type="checkbox" id="remember" class="w-4 h-4 accent-blue-primary">
                        <label for="remember" class="text-sm text-gray-600">Ingat saya di perangkat ini</label>
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-primary hover:bg-blue-primary/90 text-white font-bold py-3 rounded-xl shadow-lg shadow-blue-primary/20 transform transition active:scale-[0.98]">
                        Masuk Sekarang
                    </button>

                    <p class="text-center text-sm text-gray-500 mt-6">
                        Belum punya akun?
                        <a href="{{ route('register') }}"
                            class="text-green-dark-primary font-bold hover:text-blue-primary transition">Daftar
                            Warung</a>
                    </p>
                </form>
            </div>
        </div>
    </section>

</body>

</html>
