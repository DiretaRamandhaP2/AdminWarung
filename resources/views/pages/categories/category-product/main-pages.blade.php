@extends('layout.main')
@section('main')
    <div class="space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-black text-gray-800 tracking-tight">Category Management</h1>
                <p class="text-sm text-gray-500 font-medium">Kelola kategori produk dan pengelompokannya</p>
            </div>
            <button onclick="openAddModal()"
                class="group flex items-center justify-center gap-2 bg-blue-primary text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-blue-primary/20 group-hover:bg-blue-600 transition-all active:scale-95 w-full md:w-auto">
                <i class="fa-solid fa-plus text-sm"></i>
                Tambah Kategori Baru
            </button>
            <div id="categoryModal" class="fixed inset-0 z-50 hidden  overflow-y-auto">
                <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity"></div>

                <div class="flex min-h-full items-center justify-center p-4">
                    <div
                        class="relative w-full max-w-md transform overflow-hidden rounded-[2.5rem] bg-white p-8 shadow-2xl transition-all">

                        <div class="mb-6">
                            <h2 id="modalTitle" class="text-2xl font-black text-gray-800 tracking-tight">Tambah Kategori
                            </h2>
                            <p id="modalSubtitle" class="text-sm text-gray-500 font-medium">Isi detail kategori di bawah ini
                            </p>
                        </div>

                        @php
                            $isEdit = isset($data) ? true : false;
                        @endphp
                        <form id="categoryForm" action="" method="POST">
                            @csrf
                            <div id="methodField"></div>
                            <div class="space-y-4">
                                <div>
                                    <label
                                        class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Nama
                                        Kategori</label>
                                    <input type="text" name="category_name" id="cat_name" required
                                        class="w-full px-4 py-3 rounded-xl border border-gray-100 bg-gray-50 focus:ring-2 focus:ring-blue-primary/20 outline-none transition-all font-bold text-gray-700">
                                </div>

                                <div>
                                    <label
                                        class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Main
                                        Category</label>
                                    <select name="main_category" id="cat_main"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-100 bg-gray-50 focus:ring-2 focus:ring-blue-primary/20 outline-none transition-all font-bold text-gray-700">
                                        <option value="" selected>Pilih Grup</option>

                                        @if (isset($categories))
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        @else
                                            <option value="" disabled>Tidak ada Kategori Utama yang tersedia</option>
                                        @endif
                                    </select>
                                </div>

                                <div class="flex items-center gap-3 py-2">
                                    <input type="checkbox" name="active" id="cat_active" value="1"
                                        class="w-5 h-5 rounded-lg border-gray-300 text-blue-primary focus:ring-blue-primary">
                                    <label for="cat_active" class="text-sm font-bold text-gray-600">Set sebagai Kategori
                                        Aktif</label>
                                </div>
                            </div>

                            <div class="flex gap-3 mt-8">
                                <button type="button" onclick="closeModal()"
                                    class="flex-1 px-6 py-3 rounded-2xl font-bold text-gray-400 hover:bg-gray-100 transition-all">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="flex-1 bg-blue-primary text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-blue-primary/20 hover:bg-blue-600 transition-all active:scale-95">
                                    Simpan Data
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div
                class="group bg-white p-6 rounded-4xl border border-green-light-primary shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Total Kategori</p>
                        <h3 class="text-3xl font-black text-gray-800 tracking-tight">{{ $data->count() }} <span
                                class="text-sm font-medium text-gray-400">Item</span></h3>
                    </div>
                    <div
                        class="p-4 bg-blue-primary/10 text-blue-primary rounded-2xl group-hover:bg-blue-primary group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-tags text-2xl"></i>
                    </div>
                </div>
            </div>

            <div
                class="group bg-white p-6 rounded-4xl border border-green-light-primary shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Kategori Aktif</p>
                        <h3 class="text-3xl font-black text-gray-800 tracking-tight">
                            {{ $data->where('active', 1)->count() }}</h3>
                    </div>
                    <div
                        class="p-4 bg-green-primary/10 text-green-dark-primary rounded-2xl group-hover:bg-green-dark-primary group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-check-double text-2xl"></i>
                    </div>
                </div>
            </div>

            <div
                class="group bg-white p-6 rounded-4xl border border-green-light-primary shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Main Categories</p>
                        <h3 class="text-3xl font-black text-gray-800 tracking-tight">{{ $categories->count() }} <span
                                class="text-sm font-medium text-gray-400 italic">Grup</span></h3>
                    </div>
                    <div
                        class="p-4 bg-purple-500/10 text-purple-600 rounded-2xl group-hover:bg-purple-600 group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-layer-group text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-4xl border border-green-light-primary shadow-xl shadow-gray-100/50 overflow-hidden">
            <div
                class="bg-white rounded-[2rem] border border-green-light-primary shadow-xl shadow-gray-100/50 overflow-hidden">
                <div class="p-6">
                    <div id="filterWrapper" class="hidden">
                        <select id="statusFilter"
                            class="px-4 py-2 bg-white-primary border border-green-light-primary rounded-xl text-xs font-bold text-gray-600 outline-none focus:ring-2 focus:ring-blue-primary/20 transition-all cursor-pointer">
                            <option value="">Semua Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                        </select>
                    </div>

                    <div class="overflow-x-auto overflow-y-hidden">
                        <table id="categoriesTable" class="w-full">
                            <thead>
                                <tr
                                    class="text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-100">
                                    <th class="pb-5 px-4 text-left">No</th>
                                    <th class="pb-5 px-4 text-left">Category Name</th>
                                    <th class="pb-5 px-4 text-left">Main Category</th>
                                    <th class="pb-5 px-4 text-left">Status</th>
                                    <th class="pb-5 px-4 text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @foreach ($data as $index => $category)
                                    <tr class="group hover:bg-white-primary/80 transition-all">
                                        <td class="py-5 px-4 text-sm font-bold text-gray-500">
                                            {{ $index + 1 }}
                                        </td>
                                        <td class="py-5 px-4">
                                            <span class="font-bold text-gray-800">{{ $category->category_name }}</span>
                                        </td>
                                        <td class="py-5 px-4">
                                            <span
                                                class="text-xs font-bold text-blue-primary bg-blue-50 px-3 py-1 rounded-lg">
                                                {{ $category->mainCategory->category_name ?? "it's Main Category" }}
                                            </span>
                                        </td>
                                        <td class="py-5 px-4">
                                            <div x-data="{ isActive: {{ $category->active ? 'true' : 'false' }} }">
                                                <button type="button"
                                                    @click="isActive = !isActive; /* Tambahkan logic AJAX di sini nanti */"
                                                    :class="isActive ? 'bg-green-500' : 'bg-slate-300'"
                                                    class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-600 focus:ring-offset-2"
                                                    role="switch" aria-checked="false">

                                                    <span class="sr-only">Toggle Status</span>

                                                    <span :class="isActive ? 'translate-x-5' : 'translate-x-0'"
                                                        class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                                                    </span>
                                                </button>

                                                <span class="ml-2 text-xs font-semibold"
                                                    :class="isActive ? 'text-green-600' : 'text-slate-500'"
                                                    x-text="isActive ? 'Aktif' : 'Non-Aktif'"></span>
                                            </div>
                                        </td>
                                        <td class="py-5 px-4">
                                            <div class="flex justify-center gap-2">
                                                <button
                                                    onclick="openEditModal('{{ $category->id }}', '{{ $category->category_name }}', '{{ $category->main_category }}', '{{ $category->active }}')"
                                                    class="p-2.5 bg-blue-primary/5 text-blue-primary rounded-xl hover:bg-blue-primary hover:text-white transition-all">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                                <form
                                                    action="{{ route('management.categories-products.destroy', $category->id) }}"
                                                    method="post" class="inline">
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

            .dt-paging-button.current {
                background: #6892D5 !important;
                color: white !important;
                border-color: #6892D5 !important;
                box-shadow: 0 4px 12px rgba(104, 146, 213, 0.25);
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
                    const table = $('#categoriesTable').DataTable({
                        responsive: true,
                        pageLength: 5,
                        dom: '<"flex flex-col md:flex-row justify-between items-center gap-4 mb-6" <"flex items-center gap-3" <"#customFilter"> f >> t <"flex flex-col md:flex-row justify-between items-center gap-4 mt-6 pt-4 border-t border-gray-50" i p>',
                        language: {
                            search: "",
                            searchPlaceholder: "Cari kategori...",
                            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                            paginate: {
                                next: '<i class="fa-solid fa-angle-right"></i>',
                                previous: '<i class="fa-solid fa-angle-left"></i>'
                            }
                        }
                    });

                    $('#statusFilter').appendTo('#customFilter');
                    $('#statusFilter').on('change', function() {
                        table.column(3).search($(this).val()).draw();
                    });
                });

                function confirmDelete(button) {
                    Swal.fire({
                        title: 'Hapus Kategori?',
                        text: "Produk dengan kategori ini mungkin akan terpengaruh!",
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
            <script>
                const modal = $('#categoryModal');
                const form = $('#categoryForm');
                const modalTitle = $('#modalTitle');
                const methodField = $('#methodField');

                // 1. Fungsi Buka Modal Tambah
                function openAddModal() {
                    form[0].reset(); // Kosongkan input
                    form.attr('action', "{{ route('management.categories-products.store') }}"); // Route Store
                    methodField.html(''); // Pastikan tidak ada method PUT
                    modalTitle.text('Tambah Kategori Baru');
                    modal.removeClass('hidden');
                }

                // 2. Fungsi Buka Modal Edit
                function openEditModal(id, name, main, active) {
                    form[0].reset();
                    form.attr('action', `/management/categories-products/${id}`); // Sesuaikan route update kamu
                    methodField.html('@method('PUT')'); // Inject method PUT Laravel
                    modalTitle.text('Edit Kategori');

                    // Isi data ke input
                    $('#cat_name').val(name);
                    $('#cat_main').val(main);
                    $('#cat_active').prop('checked', active == 1);

                    modal.removeClass('hidden');
                }

                // 3. Fungsi Tutup
                function closeModal() {
                    modal.addClass('hidden');
                }
            </script>
        @endpush
    @endsection
