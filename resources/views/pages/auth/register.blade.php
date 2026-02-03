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
    <section id="register" class="min-h-screen flex items-center justify-center p-4 md:p-8">
        <div
            class="flex flex-col md:flex-row bg-white rounded-3xl shadow-2xl overflow-hidden max-w-5xl w-full border border-green-light-primary/30">

            <div
                class="hidden md:flex md:w-5/12 bg-linear-to-br from-green-dark-primary to-blue-primary p-12 flex-col justify-between text-white">
                <div>
                    <div class="flex items-center gap-2 mb-12">
                        <i class="fa-solid fa-shop text-3xl"></i>
                        <span class="text-2xl font-bold tracking-tight">AdminWarung</span>
                    </div>
                    <h2 class="text-4xl font-extrabold leading-tight mb-6">Gabung Bersama Ribuan UMKM.</h2>

                    <ul class="space-y-6">
                        <li class="flex items-start gap-4">
                            <div class="bg-white/20 p-2 rounded-lg"><i class="fa-solid fa-check"></i></div>
                            <p class="text-sm opacity-90">Pencatatan stok otomatis yang akurat dan mudah digunakan.</p>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="bg-white/20 p-2 rounded-lg"><i class="fa-solid fa-check"></i></div>
                            <p class="text-sm opacity-90">Laporan laba rugi instan untuk kembangkan bisnismu.</p>
                        </li>
                        <li class="flex items-start gap-4">
                            <div class="bg-white/20 p-2 rounded-lg"><i class="fa-solid fa-check"></i></div>
                            <p class="text-sm opacity-90">Dukungan teknis 24/7 untuk membantu kelancaran usahamu.</p>
                        </li>
                    </ul>
                </div>
                <div class="text-sm opacity-75">
                    Mulai langkah suksesmu hari ini.
                </div>
            </div>

            <div class="w-full md:w-7/12 p-8 md:p-12 bg-white max-h-[90vh] overflow-y-auto custom-scrollbar">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">Daftar Akun Baru</h2>
                    <p class="text-gray-500 mt-2 text-sm">Lengkapi data di bawah untuk mulai mengelola warung Anda.</p>
                </div>

                <form action="{{ route('register.store') }}" method="POST"
                    class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    @csrf

                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label class="text-sm font-semibold text-gray-700 ml-1">Nama Pemilik Warung</label>
                        <input type="text" name="{{ old('name') }}" placeholder="Contoh: Budi Santoso" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-green-dark-primary focus:ring-4 focus:ring-green-dark-primary/10 transition-all outline-none">
                    </div>

                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label class="text-sm font-semibold text-gray-700 ml-1">Username</label>
                        <input type="text" name="{{ old('username') }}" placeholder="Contoh: Budi Santoso" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-green-dark-primary focus:ring-4 focus:ring-green-dark-primary/10 transition-all outline-none">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-sm font-semibold text-gray-700 ml-1">Email Aktif</label>
                        <input type="email" name="{{ old('email') }}" placeholder="budi@email.com" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-green-dark-primary focus:ring-4 focus:ring-green-dark-primary/10 transition-all outline-none">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-sm font-semibold text-gray-700 ml-1">Nomor WhatsApp</label>
                        <input type="tel" name="{{ old('phone') }}" placeholder="628123xxxxxxx" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-green-dark-primary focus:ring-4 focus:ring-green-dark-primary/10 transition-all outline-none">
                    </div>

                    <div class="flex flex-col gap-1.5 md:col-span-2">
                        <label class="text-sm font-semibold text-gray-700 ml-1">Nama Warung / Toko</label>
                        <input type="text" name="{{ old('store_name') }}" placeholder="Contoh: Warung Berkah Jaya" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-green-dark-primary focus:ring-4 focus:ring-green-dark-primary/10 transition-all outline-none">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-sm font-semibold text-gray-700 ml-1">Buat Password</label>
                        <input type="password" name="password" placeholder="••••••••" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-green-dark-primary focus:ring-4 focus:ring-green-dark-primary/10 transition-all outline-none">
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="text-sm font-semibold text-gray-700 ml-1">Ulangi Password</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••" required
                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-green-dark-primary focus:ring-4 focus:ring-green-dark-primary/10 transition-all outline-none">
                    </div>

                    <div class="flex items-start gap-3 px-1 md:col-span-2 py-2">
                        <input type="checkbox" id="terms" required
                            class="mt-1 w-4 h-4 accent-green-dark-primary rounded">
                        <label for="terms" class="text-xs text-gray-500 leading-relaxed">
                            Saya setuju dengan <a href="#"
                                class="text-blue-primary font-bold hover:underline">Syarat & Ketentuan</a> serta <a
                                href="#" class="text-blue-primary font-bold hover:underline">Kebijakan Privasi</a>
                            AdminWarung.
                        </label>
                    </div>

                    <button type="submit"
                        class="md:col-span-2 w-full bg-green-dark-primary hover:bg-green-dark-primary/90 text-white font-bold py-3.5 rounded-xl shadow-lg shadow-green-dark-primary/20 transform transition active:scale-[0.98] mt-2">
                        Daftar Warung Sekarang
                    </button>

                    <p class="md:col-span-2 text-center text-sm text-gray-500 mt-4">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-blue-primary font-bold hover:underline">Masuk di sini</a>
                    </p>
                </form>
            </div>
        </div>
    </section>

    <style>
        /* Custom scrollbar untuk form jika isinya panjang di layar kecil */
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #C9FDD7;
            border-radius: 10px;
        }
    </style>

</body>
</html>
