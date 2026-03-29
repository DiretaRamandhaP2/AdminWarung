@extends('layout.main')
@section('main')
    <div class="space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-black text-gray-800 tracking-tight">Product Management</h1>
                <p class="text-sm text-gray-500 font-medium">Kelola inventaris, harga, dan detail produk Anda</p>
            </div>
            <button onclick="openAddModal()"
                class="group flex items-center justify-center gap-2 bg-indigo-600 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all active:scale-95 w-full md:w-auto">
                <i class="fa-solid fa-plus text-sm"></i>
                Tambah Produk Baru
            </button>

            <div id="productModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
                <div class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity"></div>
                <div class="flex min-h-full items-center justify-center p-4">
                    <div
                        class="relative w-full max-w-2xl transform overflow-hidden rounded-[2.5rem] bg-white p-8 shadow-2xl transition-all text-left">

                        <div class="mb-6 text-left">
                            <h2 id="modalTitle" class="text-2xl font-black text-gray-800 tracking-tight text-left">Tambah
                                Produk</h2>
                            <p id="modalSubtitle" class="text-sm text-gray-500 font-medium">Lengkapi detail spesifikasi
                                produk di bawah ini</p>
                        </div>

                        <form id="productForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="methodField"></div>
                            <div id="actionField" style="display:none;"></div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-4">
                                    <div>
                                        <label
                                            class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Nama
                                            Produk</label>
                                        <input type="text" name="product_name" id="prod_name" required
                                            class="w-full px-4 py-3 rounded-xl border border-gray-100 bg-gray-50 focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all font-bold text-gray-700">
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Kategori</label>
                                        <select name="category_id" id="prod_category" required
                                            class="w-full px-4 py-3 rounded-xl border border-gray-100 bg-gray-50 focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all font-bold text-gray-700">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="space-y-4">
                                    <div>
                                        <label
                                            class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Harga
                                            (Rp)</label>
                                        <input type="number" name="price" id="prod_price" step="0.01" required
                                            class="w-full px-4 py-3 rounded-xl border border-gray-100 bg-gray-50 focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all font-bold text-gray-700">
                                    </div>
                                    <div>
                                        <label
                                            class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Stok</label>
                                        <input type="number" name="stock" id="prod_stock" required
                                            class="w-full px-4 py-3 rounded-xl border border-gray-100 bg-gray-50 focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all font-bold text-gray-700">
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label
                                    class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Deskripsi</label>
                                <textarea name="description" id="prod_description"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-100 bg-gray-50 focus:ring-2 focus:ring-indigo-500/20 outline-none transition-all font-bold text-gray-700 resize-none"
                                    rows="3"></textarea>
                            </div>

                            <div class="mt-4">
                                <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Foto
                                    Produk</label>
                                <div id="editImageNotice" class="hidden mb-2">
                                    <p class="text-[10px] text-amber-500 font-bold italic">*Kosongkan jika tidak ingin
                                        mengubah foto</p>
                                </div>
                                <input type="file" name="thumbnail" id="prod_thumbnail"
                                    class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                            </div>
                            <div class="flex items-center gap-3 mt-6">
                                <input type="checkbox" name="active" id="prod_active" value="1"
                                    class="w-5 h-5 rounded-lg border-gray-300 text-indigo-600 focus:ring-indigo-500">
                                <label for="prod_active" class="text-sm font-bold text-gray-600">Produk ini tersedia
                                    (Aktif)</label>
                            </div>

                            <div class="flex gap-3 mt-8">
                                <button type="button" onclick="closeModal()"
                                    class="flex-1 px-6 py-3 rounded-2xl font-bold text-gray-400 hover:bg-gray-100 transition-all text-center">Batal</button>
                                <button type="submit"
                                    class="flex-1 bg-indigo-600 text-white px-6 py-3 rounded-2xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition-all active:scale-95 text-center">Simpan
                                    Produk</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div
                class="group bg-white p-6 rounded-4xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Total Produk</p>
                        <h3 class="text-3xl font-black text-gray-800 tracking-tight">{{ $products->count() }} <span
                                class="text-sm font-medium text-gray-400">Unit</span></h3>
                    </div>
                    <div
                        class="p-4 bg-indigo-50 text-indigo-600 rounded-2xl group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-box-open text-2xl"></i>
                    </div>
                </div>
            </div>

            <div
                class="group bg-white p-6 rounded-4xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Stok Kritis</p>
                        @php
                            $lowStockCount = $products->where('stock', '<', 16)->count();
                        @endphp
                        <h3 class="text-3xl font-black text-red-500 tracking-tight">{{ $lowStockCount }}</h3>
                    </div>
                    <div
                        class="p-4 bg-red-50 text-red-500 rounded-2xl group-hover:bg-red-500 group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-triangle-exclamation text-2xl"></i>
                    </div>
                </div>
            </div>

            <div
                class="group bg-white p-6 rounded-4xl border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Nilai Inventori</p>
                        @php
                            $priceProducts = $products->map(fn($item) => $item->price * $item->stock);
                        @endphp
                        <h3 class="text-3xl font-black text-gray-800 tracking-tight">Rp
                            {{ number_format($priceProducts->sum(), 0, ',', '.') }}</h3>
                    </div>
                    <div
                        class="p-4 bg-emerald-50 text-emerald-600 rounded-2xl group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-vault text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-4xl border border-gray-100 shadow-xl shadow-gray-100/50 overflow-hidden">
            <div class="p-6">
                <div id="filterWrapper" class="hidden">
                    <select id="categoryFilter"
                        class="px-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-xs font-bold text-gray-600 outline-none focus:ring-2 focus:ring-indigo-500/20 transition-all cursor-pointer">
                        <option value="">Semua Kategori</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Pakaian">Pakaian</option>
                    </select>
                </div>

                <div class="overflow-x-auto">
                    <table id="productsTable" class="w-full">
                        <thead>
                            <tr
                                class="text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-50">
                                <th class="pb-5 px-4 text-left">No</th>
                                <th class="pb-5 px-4 text-left">Produk</th>
                                <th class="pb-5 px-4 text-left">Harga</th>
                                <th class="pb-5 px-4 text-left">Stok</th>
                                <th class="pb-5 px-4 text-left">Status</th>
                                <th class="pb-5 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse ($products as $index => $item)
                                <tr class="group hover:bg-indigo-50/30 transition-all">
                                    <td class="py-5 px-4 text-sm font-bold text-gray-400">{{ $index + 1 }}</td>
                                    <td class="py-5 px-4">
                                        <div class="flex items-center gap-4">
                                            @if ($item->thumbnail)
                                                <img src="{{ asset('storage/' . $item->thumbnail) }}"
                                                    alt="{{ $item->product_name }}"
                                                    class="w-12 h-12 bg-gray-100 rounded-2xl object-cover">
                                            @else
                                                <div
                                                    class="w-12 h-12 bg-gray-100 rounded-2xl flex items-center justify-center text-indigo-400">
                                                    <i class="fa-solid fa-image text-xl"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <span
                                                    class="block font-bold text-gray-800 group-hover:text-indigo-600">{{ $item->product_name }}</span>
                                                <span
                                                    class="text-[10px] font-black text-gray-400 uppercase tracking-tighter">{{ $item->category->category_name ?? 'Kategori tidak ditemukan' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-5 px-4">
                                        <span class="text-sm font-black text-gray-700">Rp
                                            {{ number_format($item->price, 0, ',', '.') }}</span>
                                    </td>
                                    <td class="py-5 px-4">
                                        <span class="text-sm font-bold text-gray-600">{{ $item->stock }} Unit</span>
                                    </td>
                                    <td class="py-5 px-4">
                                        <span
                                            class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-tighter {{ $item->active ? 'bg-indigo-100 text-indigo-600' : 'bg-slate-100 text-slate-400' }}">
                                            {{ $item->active ? 'Aktif' : 'Off' }}
                                        </span>
                                    </td>
                                    <td class="py-5 px-4 text-center">
                                        <div class="flex justify-center gap-2">
                                            <button type="button" onclick="handleEdit(this)"
                                                data-id="{{ $item->id }}" data-name="{{ $item->product_name }}"
                                                data-category="{{ $item->category_id }}"
                                                data-price="{{ $item->price }}" data-stock="{{ $item->stock }}"
                                                data-active="{{ $item->active }}"
                                                data-description="{{ $item->description }}"
                                                class="p-2.5 bg-indigo-50 text-indigo-500 rounded-xl hover:bg-indigo-600 hover:text-white transition-all shadow-sm">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>
                                            <form action="{{ route('management.products.destroy', $item->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Hapus produk ini?')"
                                                    class="p-2.5 bg-red-50 text-red-400 rounded-xl hover:bg-red-500 hover:text-white transition-all shadow-sm">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-8 px-4 text-center text-gray-500 font-bold">Tidak ada
                                        data produk</td>
                                </tr>
                            @endempty
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Gunakan helper route Laravel untuk dasar URL
        const storeRoute = "{{ route('management.products.store') }}";
        // Untuk update, kita buat template string
        const updateRouteTemplate = "{{ route('management.products.update', ':id') }}";

        function openAddModal() {
            // Reset Form
            $('#productForm')[0].reset();
            $('#methodField').html(''); // Tidak butuh PUT untuk Create
            $('#productForm').attr('action', storeRoute);

            // UI Update
            $('#modalTitle').text('Tambah Produk Baru');
            $('#modalSubtitle').text('Lengkapi detail spesifikasi produk di bawah ini');
            $('#editImageNotice').addClass('hidden');
            $('#prod_thumbnail').prop('required', true);

            $('#productModal').removeClass('hidden');
        }

        // Ganti fungsi openEditModal lama dengan ini
        function handleEdit(btn) {
            const data = $(btn).data(); // Mengambil semua data-* sekaligus

            // Reset Form
            $('#productForm')[0].reset();

            // Set Method PUT
            $('#methodField').html('<input type="hidden" name="_method" value="PUT">');

            // Set Action URL
            const actionUrl = updateRouteTemplate.replace(':id', data.id);
            $('#productForm').attr('action', actionUrl);

            // Isi Data ke Field - Sesuaikan dengan key di data-* (otomatis camelCase)
            $('#prod_name').val(data.name);
            $('#prod_category').val(data.category);
            $('#prod_price').val(data.price);
            $('#prod_stock').val(data.stock);
            $('#prod_description').val(data.description);
            $('#prod_active').prop('checked', data.active == 1);

            // UI Update
            $('#modalTitle').text('Edit Produk');
            $('#modalSubtitle').text('Perbarui informasi produk yang Anda pilih');
            $('#editImageNotice').removeClass('hidden');
            $('#prod_thumbnail').prop('required', false);

            // TAMPILKAN MODAL
            $('#productModal').removeClass('hidden');
        }

        function closeModal() {
            $('#productModal').addClass('hidden');
        }
    </script>
@endpush
@endsection
