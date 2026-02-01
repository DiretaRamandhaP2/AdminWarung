<!DOCTYPE html>
<html lang="en">
@include('layout.header.header')
@stack('css')
<style type="text/tailwindcss">
    @theme {
        --color-blue-primary: #6892D5;
        --color-green-dark-primary: #79D1C3;
        --color-green-light-primary: #C9FDD7;
        --color-white-primary: #F8FCFB;
    }
</style>

<body class="bg-white-primary font-sans antialiased">
    <div class="flex min-h-screen">
        <aside
            class="fixed left-0 top-0 h-screen w-64 bg-white border-r border-green-light-primary flex flex-col z-20 shadow-sm">
            <div class="relative h-48 flex flex-col items-center justify-center overflow-hidden">
                <div class="absolute top-0 w-full h-24 bg-linear-to-r from-blue-primary to-green-dark-primary"></div>

                <div class="relative z-10 mt-8">
                    <img src="https://images.squarespace-cdn.com/content/v1/656f4e4dababbd7c042c4946/82bec838-05c8-4d68-b173-2284a6ad4e52/how-to-stop-being-a-people-pleaser"
                        alt="Profile" class="w-20 h-20 object-cover rounded-2xl border-4 border-white shadow-md">
                    <div class="absolute bottom-0 right-0 w-4 h-4 bg-green-500 border-2 border-white rounded-full">
                    </div>
                </div>

                <div class="text-center mt-3 px-4">
                    <h3 class="text-gray-800 font-bold truncate w-48">Direta Ramandha</h3>
                    <p class="text-xs text-gray-500 font-medium truncate">Owner AdminWarung</p>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto px-4 py-2 custom-scrollbar">
                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4 ml-2">Main Menu</p>

                <ul class="space-y-1.5">
                    <li>
                        <a href="#"
                            class="flex items-center py-3 px-4 rounded-xl text-blue-primary bg-blue-primary/10 font-bold transition-all">
                            <i class="fa-solid fa-chart-pie mr-3"></i>
                            <span class="text-sm">Dashboard</span>
                        </a>
                    </li>

                    <li x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full py-3 px-4 rounded-xl text-gray-600 hover:bg-green-light-primary/30 hover:text-green-dark-primary transition-all text-sm font-semibold group">
                            <span class="flex items-center">
                                <i class="fa-solid fa-user-shield mr-3 group-hover:scale-110 transition"></i>
                                User Management
                            </span>
                            <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300"
                                :class="{ 'rotate-180': open }"></i>
                        </button>
                        <ul x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            class="mt-1 ml-4 border-l-2 border-green-light-primary space-y-1">
                            <li><a href="#"
                                    class="block py-2 px-6 text-sm text-gray-500 hover:text-blue-primary font-medium">Data
                                    Admin</a></li>
                            <li><a href="#"
                                    class="block py-2 px-6 text-sm text-gray-500 hover:text-blue-primary font-medium">Role
                                    & Permission</a></li>
                        </ul>
                    </li>

                    <li x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center justify-between w-full py-3 px-4 rounded-xl text-gray-600 hover:bg-green-light-primary/30 hover:text-green-dark-primary transition-all text-sm font-semibold group">
                            <span class="flex items-center">
                                <i class="fa-solid fa-boxes-stacked mr-3 group-hover:scale-110 transition"></i>
                                Inventory
                            </span>
                            <i class="fa-solid fa-chevron-down text-[10px] transition-transform duration-300"
                                :class="{ 'rotate-180': open }"></i>
                        </button>
                        <ul x-show="open" x-transition
                            class="mt-1 ml-4 border-l-2 border-green-light-primary space-y-1">
                            <li><a href="#"
                                    class="block py-2 px-6 text-sm text-gray-500 hover:text-blue-primary font-medium">Daftar
                                    Barang</a></li>
                            <li><a href="#"
                                    class="block py-2 px-6 text-sm text-gray-500 hover:text-blue-primary font-medium">Kategori</a>
                            </li>
                        </ul>
                    </li>

                    <li class="pt-4 mt-4 border-t border-gray-100">
                        <a href="{{ route('logout') }}"
                            class="flex items-center py-3 px-4 rounded-xl text-red-400 hover:bg-red-50 transition-all text-sm font-bold">
                            <i class="fa-solid fa-right-from-bracket mr-3"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="flex-1 ml-64 flex flex-col">
            <header class="sticky top-0 z-10 bg-white/80 backdrop-blur-md border-b border-gray-100 px-8 py-4">
                <div class="flex justify-between items-center">
                    <div class="flex flex-col">
                        <h2 class="text-xl font-bold text-gray-800">Dashboard</h2>
                        <p class="text-xs text-gray-400">Selamat datang kembali di sistem AdminWarung</p>
                    </div>

                    <div class="flex items-center gap-4">
                        <button class="relative p-2 text-gray-400 hover:text-blue-primary transition">
                            <i class="fa-solid fa-bell text-xl"></i>
                            <span
                                class="absolute top-1 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                        </button>
                        <div class="h-8 w-[1px] bg-gray-200 mx-2"></div>
                        <a href="#"
                            class="p-2 bg-white-primary rounded-lg border border-green-light-primary text-green-dark-primary hover:bg-green-dark-primary hover:text-white transition shadow-sm">
                            <i class="fa-solid fa-gear"></i>
                        </a>
                    </div>
                </div>
            </header>

            <main class="p-8 bg-white-primary flex-1">
                @include('sweetalert::alert')

                @yield('main')
            </main>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #C9FDD7;
            border-radius: 10px;
        }
    </style>
</body>
@stack('js')

</html>
