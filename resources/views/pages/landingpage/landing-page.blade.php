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

<body class="bg-white-primary font-sans text-gray-800">
    @include('sweetalert::alert')
    <nav class="bg-white-primary/80 sticky top-0 z-50 backdrop-blur-md border-b border-green-light-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2">
                    <div class="bg-blue-primary p-2 rounded-lg text-white">
                        <i class="fa-solid fa-shop"></i>
                    </div>
                    <span class="text-xl font-bold text-blue-primary">AdminWarung</span>
                </div>
                <div class="hidden md:flex space-x-8 font-medium">
                    <a href="#home" class="hover:text-blue-primary transition">Home</a>
                    <a href="#about" class="hover:text-blue-primary transition">Tentang</a>
                    <a href="#contact" class="hover:text-blue-primary transition">Kontak</a>
                </div>
                <div class="flex gap-4">
                    <a href="{{ route('login') }}">
                        <button
                            class="px-5 py-2 rounded-full border border-blue-primary text-blue-primary hover:bg-blue-primary hover:text-white transition">Login</button>
                    </a>
                    <a href="{{ route('register') }}">
                        <button
                            class="hidden sm:block px-5 py-2 rounded-full bg-green-dark-primary text-white hover:bg-blue-primary transition shadow-md">Daftar
                            Gratis</button>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section id="home" class="py-20 px-4 bg-linear-to-b from-green-light-primary/30 to-white-primary">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 mb-6">
                Kelola Warung Jadi Lebih <span class="text-blue-primary">Modern</span> & <span
                    class="text-green-dark-primary">Efisien</span>
            </h1>
            <p class="text-lg text-gray-600 mb-10 max-w-2xl mx-auto">
                Lupakan pencatatan manual di buku. AdminWarung membantu Anda mengontrol stok, laporan keuangan, dan
                transaksi dalam satu genggaman.
            </p>
            <div class="flex justify-center gap-4">
                <a href="#"
                    class="px-8 py-4 bg-blue-primary text-white rounded-xl shadow-lg hover:scale-105 transition">Mulai
                    Sekarang</a>
                <a href="#"
                    class="px-8 py-4 bg-white text-blue-primary border border-blue-primary rounded-xl hover:bg-green-light-primary transition">Pelajari
                    Fitur</a>
            </div>
        </div>
    </section>

    <section id="about" class="py-20 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div
                        class="absolute -top-4 -left-4 w-64 h-64 bg-green-light-primary rounded-full filter blur-3xl opacity-50">
                    </div>
                    <img src="https://i.pinimg.com/736x/5d/08/a2/5d08a2894a5ecefe565695c3e1dcc86c.jpg"
                        alt="Dashboard Admin"
                        class="relative rounded-2xl shadow-2xl border-4 border-white aspect-3/2 object-cover">
                </div>
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Kenapa Memilih AdminWarung?</h2>
                    <div class="space-y-6">
                        <div class="flex gap-4">
                            <div
                                class="flex-none w-12 h-12 bg-blue-primary/10 flex items-center justify-center rounded-lg text-blue-primary">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Laporan Real-Time</h4>
                                <p class="text-gray-600">Pantau keuntungan dan pengeluaran warung kapan saja dan di mana
                                    saja.</p>
                            </div>
                        </div>
                        <div class="flex gap-4">
                            <div
                                class="flex-none w-12 h-12 bg-green-dark-primary/10 flex items-center justify-center rounded-lg text-green-dark-primary">
                                <i class="fa-solid fa-boxes-stacked"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg">Manajemen Stok</h4>
                                <p class="text-gray-600">Notifikasi otomatis jika stok barang dagangan Anda mulai
                                    menipis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-20 px-4 bg-green-dark-primary/10">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="grid md:grid-cols-2">
                <div class="bg-blue-primary p-10 text-white">
                    <h2 class="text-3xl font-bold mb-6">Hubungi Kami</h2>
                    <p class="mb-8 opacity-90">Butuh bantuan atau ingin bertanya seputar kemitraan?</p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-envelope"></i>
                            <span>halo@adminwarung.com</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-phone"></i>
                            <span>+62 812 3456 7890</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Jakarta, Indonesia</span>
                        </div>
                    </div>
                </div>
                <div class="p-10">
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-primary focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Pesan</label>
                            <textarea rows="4"
                                class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-primary focus:outline-none"></textarea>
                        </div>
                        <button type="button" onclick="Swal.fire('Sukses!', 'Pesan Anda telah terkirim.', 'success')"
                            class="w-full py-3 bg-green-dark-primary text-white font-bold rounded-lg hover:bg-blue-primary transition">Kirim
                            Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white py-12 px-4 border-t border-green-light-primary">
        <div class="max-w-7xl mx-auto flex flex-col md:flex-row justify-between items-center gap-8">
            <div class="flex items-center gap-2">
                <div class="bg-blue-primary p-2 rounded-lg text-white">
                    <i class="fa-solid fa-shop"></i>
                </div>
                <span class="text-xl font-bold text-blue-primary">AdminWarung</span>
            </div>
            <p class="text-gray-500 text-sm">© 2026 AdminWarung. Dibuat dengan cinta untuk UMKM Indonesia.</p>
            <div class="flex gap-6 text-2xl text-blue-primary">
                <a href="#"><i class="fa-brands fa-facebook hover:text-green-dark-primary transition"></i></a>
                <a href="#"><i class="fa-brands fa-instagram hover:text-green-dark-primary transition"></i></a>
                <a href="#"><i class="fa-brands fa-whatsapp hover:text-green-dark-primary transition"></i></a>
            </div>
        </div>
    </footer>

</body>

</html>
