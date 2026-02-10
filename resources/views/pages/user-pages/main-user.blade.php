@extends('layout.main')
@section('main')
    <div class="space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-black text-gray-800 tracking-tight">User Management</h1>
                <p class="text-sm text-gray-500 font-medium">Kelola hak akses dan informasi pengguna sistem</p>
            </div>
            <a href="{{ route('management.users.create') }}" class="group">
                <button
                    class="flex items-center justify-center gap-2 bg-blue-primary text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-blue-primary/20 group-hover:bg-blue-600 transition-all active:scale-95 w-full md:w-auto">
                    <i class="fa-solid fa-plus text-sm"></i>
                    Tambah Pengguna Baru
                </button>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div
                class="group bg-white p-6 rounded-[2rem] border border-green-light-primary shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Total Pengguna</p>
                        <h3 class="text-3xl font-black text-gray-800 tracking-tight">{{ $data->count() }} <span
                                class="text-sm font-medium text-gray-400">Akun</span></h3>
                        <div class="mt-3 flex items-center">
                            <span
                                class="flex items-center text-[10px] font-bold text-blue-primary bg-blue-50 px-2 py-1 rounded-lg border border-blue-100">
                                <i class="fa-solid fa-users mr-1"></i> Terdaftar
                            </span>
                            <span class="text-[10px] text-gray-400 ml-2 font-medium italic">Dalam Sistem</span>
                        </div>
                    </div>
                    <div
                        class="p-4 bg-blue-primary/10 text-blue-primary rounded-2xl group-hover:bg-blue-primary group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-user-group text-2xl"></i>
                    </div>
                </div>
            </div>

            <div
                class="group bg-white p-6 rounded-[2rem] border border-green-light-primary shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Online Sekarang</p>
                        <h3 class="text-3xl font-black text-gray-800 tracking-tight">12 <span
                                class="text-sm font-medium text-gray-400 italic">User</span></h3>
                        <div class="mt-3 flex items-center">
                            <span
                                class="flex items-center text-[10px] font-bold text-green-500 bg-green-50 px-2 py-1 rounded-lg border border-green-100">
                                <span class="flex h-1.5 w-1.5 rounded-full bg-green-500 mr-1.5 animate-pulse"></span> Sesi
                                Aktif
                            </span>
                            <span class="text-[10px] text-gray-400 ml-2 font-medium">Real-time</span>
                        </div>
                    </div>
                    <div
                        class="p-4 bg-green-primary/10 text-green-dark-primary rounded-2xl group-hover:bg-green-dark-primary group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-signal text-2xl"></i>
                    </div>
                </div>
            </div>

            <div
                class="group bg-white p-6 rounded-[2rem] border border-green-light-primary shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Akses Admin</p>
                        <h3 class="text-3xl font-black text-gray-800 tracking-tight">3 <span
                                class="text-sm font-medium text-gray-400 italic">Level</span></h3>
                        <div class="mt-3 flex items-center">
                            <span
                                class="flex items-center text-[10px] font-bold text-purple-600 bg-purple-50 px-2 py-1 rounded-lg border border-purple-100">
                                Protected
                            </span>
                            <span class="text-[10px] text-gray-400 ml-2 font-medium italic">Admin, Owner, Kasir</span>
                        </div>
                    </div>
                    <div
                        class="p-4 bg-purple-500/10 text-purple-600 rounded-2xl group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-shield-halved text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-[2rem] border border-green-light-primary shadow-xl shadow-gray-100/50 overflow-hidden">
            <div class="p-6">
                <div id="filterWrapper" class="hidden">
                    <select id="roleFilter"
                        class="px-4 py-2 bg-white-primary border border-green-light-primary rounded-xl text-xs font-bold text-gray-600 outline-none focus:ring-2 focus:ring-blue-primary/20 transition-all cursor-pointer">
                        <option value="">Semua Role</option>
                        <option value="Admin">Admin</option>
                        <option value="Owner">Owner</option>
                        <option value="Kasir">Kasir</option>
                    </select>
                </div>

                <div class="overflow-x-auto overflow-y-hidden">
                    <table id="usersTable" class="w-full">
                        <thead>
                            <tr
                                class="text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-100">
                                <th class="pb-5 px-4 text-left">Pengguna</th>
                                <th class="pb-5 px-4 text-left">Role</th>
                                <th class="pb-5 px-4 text-left">Status</th>
                                <th class="pb-5 px-4 text-left">Terakhir Login</th>
                                <th class="pb-5 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach ($data as $user)
                                <tr class="group hover:bg-white-primary/80 transition-all">
                                    <td class="py-5 px-4">
                                        <div class="flex items-center gap-4">
                                            <div
                                                class="w-10 h-10 rounded-xl bg-blue-primary/10 flex items-center justify-center text-blue-primary font-bold flex-shrink-0">
                                                {{ strtoupper(substr($user->name, 0, 2)) }}
                                            </div>
                                            <div class="flex flex-col min-w-0">
                                                <span class="font-bold text-gray-800 truncate">{{ $user->name }}</span>
                                                <span
                                                    class="text-xs text-gray-400 font-medium truncate">{{ $user->email }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-5 px-4 text-xs font-bold">
                                        @php
                                            $roleClasses = [
                                                'admin' => 'bg-purple-50 text-purple-600 border-purple-100',
                                                'store_owner' => 'bg-amber-50 text-amber-600 border-amber-100',
                                                'kasir' => 'bg-blue-50 text-blue-600 border-blue-100',
                                            ];
                                            $roleLabel = [
                                                'admin' => 'Admin',
                                                'store_owner' => 'Owner',
                                                'kasir' => 'Kasir',
                                            ];
                                        @endphp
                                        <span
                                            class="uppercase tracking-wider px-3 py-1 rounded-lg border {{ $roleClasses[$user->role] ?? $roleClasses['kasir'] }}">
                                            {{ $roleLabel[$user->role] ?? 'Kasir' }}
                                        </span>
                                    </td>
                                    <td class="py-5 px-4">
                                        <span class="flex items-center gap-1.5 text-xs font-bold text-green-500">
                                            <span class="relative flex h-2 w-2">
                                                <span
                                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                                                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                            </span>
                                            Aktif
                                        </span>
                                    </td>
                                    <td class="py-5 px-4 text-xs font-medium text-gray-500 italic">
                                        2 Jam yang lalu
                                    </td>
                                    <td class="py-5 px-4">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('management.users.edit', $user->id) }}"
                                                class="p-2.5 bg-blue-primary/5 text-blue-primary rounded-xl hover:bg-blue-primary hover:text-white transition-all">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('management.users.destroy', $user->id) }}" method="post"
                                                class="inline">
                                                @csrf @method('DELETE')
                                                <button type="button" onclick="confirmDelete(this)"
                                                    class="p-2.5 bg-red-50 text-red-400 rounded-xl hover:bg-red-500 hover:text-white transition-all">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Unified Datatable Styles */
        .dt-search {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0 !important;
        }

        .dt-search input {
            margin-left: 0 !important;
            background-color: #F8FCFB !important;
            border: 1px solid #C9FDD7 !important;
            border-radius: 0.75rem !important;
            padding: 0.5rem 1rem !important;
            font-size: 0.875rem !important;
            width: 280px !important;
            outline: none !important;
            transition: all 0.3s;
        }

        .dt-search input:focus {
            border-color: #6892D5 !important;
            box-shadow: 0 0 0 4px rgba(104, 146, 213, 0.1);
        }

        .dt-paging {
            display: flex !important;
            align-items: center;
            gap: 0.4rem;
        }

        .dt-paging-button {
            min-width: 38px;
            height: 38px;
            display: flex !important;
            align-items: center;
            justify-content: center;
            border-radius: 12px !important;
            font-size: 0.8rem !important;
            font-weight: 700 !important;
            color: #64748b !important;
            background: #ffffff !important;
            border: 1px solid #e2e8f0 !important;
            transition: all 0.2s ease !important;
            cursor: pointer;
            padding: 0 !important;
        }

        .dt-paging-button:hover:not(.disabled):not(.current) {
            background: #f1f5f9 !important;
            transform: translateY(-1px);
        }

        .dt-paging-button.current {
            background: #6892D5 !important;
            color: white !important;
            border-color: #6892D5 !important;
            box-shadow: 0 4px 12px rgba(104, 146, 213, 0.25);
        }

        .dt-paging-button.disabled {
            opacity: 0.4;
            cursor: not-allowed !important;
        }

        .dt-info {
            font-size: 0.8rem !important;
            color: #94a3b8 !important;
            font-weight: 500;
        }

        table.dataTable thead th {
            border-bottom: 1px solid #f3f4f6 !important;
        }
    </style>

    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            $(document).ready(function() {
                const table = $('#usersTable').DataTable({
                    responsive: true,
                    pageLength: 5,
                    dom: '<"flex flex-col md:flex-row justify-between items-center gap-4 mb-6" <"flex items-center gap-3" <"#customFilter"> f >> ' +
                        't' +
                        '<"flex flex-col md:flex-row justify-between items-center gap-4 mt-6 pt-4 border-t border-gray-50" i p>',
                    language: {
                        search: "",
                        searchPlaceholder: "Cari pengguna...",
                        info: "Menampilkan <span class='font-bold text-gray-700'>_START_</span> sampai <span class='font-bold text-gray-700'>_END_</span> dari <span class='font-bold text-gray-700'>_TOTAL_</span> data",
                        paginate: {
                            next: '<i class="fa-solid fa-angle-right"></i>',
                            previous: '<i class="fa-solid fa-angle-left"></i>'
                        }
                    }
                });

                // Memindahkan dropdown filter ke posisi yang benar
                $('#roleFilter').appendTo('#customFilter');

                // Filter berdasarkan role
                $('#roleFilter').on('change', function() {
                    table.column(1).search($(this).val()).draw();
                });
            });

            function confirmDelete(button) {
                Swal.fire({
                    title: 'Hapus Pengguna?',
                    text: "Data yang dihapus tidak dapat dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#6892D5',
                    cancelButtonColor: '#f87171',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    borderRadius: '1.5rem'
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.closest('form').submit();
                    }
                })
            }
        </script>
    @endpush
@endsection
