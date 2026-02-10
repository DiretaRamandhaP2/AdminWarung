@extends('layout.main')
@section('main')
    <div class="max-w-4xl mx-auto space-y-6">
        <div class="flex flex-col gap-1">
            <div class="flex items-center gap-2 text-xs font-bold text-blue-primary uppercase tracking-widest">
                <a href="{{ route('management.users.index') }}" class="hover:underline">User Management</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <span class="text-gray-400">Tambah Pengguna</span>
            </div>
            <h1 class="text-2xl font-black text-gray-800 tracking-tight">Tambah Pengguna Baru</h1>
        </div>

        <form action="{{ route('management.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <span class="hidden">
                    {{ isset($data) ? $isEdit = true : $isEdit = false }}
                </span>
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white p-8 rounded-[2rem] border border-green-light-primary shadow-sm text-center">
                        <h3 class="text-sm font-bold text-gray-700 mb-6">Foto Profil</h3>

                        <div class="relative w-32 h-32 mx-auto mb-6 group">
                            <img id="previewImg" src="{{ asset('assets/img/icon_profile.png') }}" alt="Preview"
                                class="w-full h-full object-cover rounded-3xl border-4 border-white-primary shadow-lg transition group-hover:opacity-75">

                            <label for="profile_image"
                                class="absolute inset-0 flex items-center justify-center bg-black/40 rounded-3xl opacity-0 group-hover:opacity-100 cursor-pointer transition-opacity">
                                <i class="fa-solid fa-camera text-white text-xl"></i>
                            </label>
                            <input type="file" name="profile_image" id="profile_image" class="hidden" accept="image/*"
                                onchange="previewFile()">
                        </div>

                        <p class="text-[10px] text-gray-400 font-medium leading-relaxed">
                            Gunakan format JPG, PNG atau WebP.<br>Maksimal ukuran file 2MB.
                        </p>
                    </div>

                    <div class="bg-blue-primary/5 p-6 rounded-[2rem] border border-blue-primary/10">
                        <div class="flex gap-3 items-start text-blue-primary">
                            <i class="fa-solid fa-circle-info mt-1"></i>
                            <p class="text-xs font-medium leading-relaxed">
                                Pastikan email yang didaftarkan aktif untuk keperluan verifikasi dan reset password.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8">
                    <div class="bg-white p-8 rounded-[2rem] border border-green-light-primary shadow-xl shadow-gray-100/50">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div class="md:col-span-2 space-y-2">
                                <label class="text-sm font-bold text-gray-700 ml-1">Nama Lengkap</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                        <i class="fa-solid fa-id-card"></i>
                                    </span>
                                    <input type="text" name="name" placeholder="Masukkan nama lengkap..." required
                                        value="{{ $isEdit ? $data->name : '' }}"
                                        class="w-full pl-11 pr-4 py-3 bg-white-primary border border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-primary/10 focus:border-blue-primary outline-none transition-all font-medium text-gray-700">
                                </div>
                            </div>

                            <div class="md:col-span-2 space-y-2">
                                <label class="text-sm font-bold text-gray-700 ml-1">Username</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                        <i class="fa-solid fa-id-card"></i>
                                    </span>
                                    <input type="text" name="username" placeholder="Masukkan Username..." required
                                        value="{{ $isEdit ? $data->username : '' }}"
                                        class="w-full pl-11 pr-4 py-3 bg-white-primary border border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-primary/10 focus:border-blue-primary outline-none transition-all font-medium text-gray-700">
                                </div>
                            </div>

                            <div class="md:col-span-2 space-y-2">
                                <label class="text-sm font-bold text-gray-700 ml-1">Alamat Email</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                        <i class="fa-solid fa-envelope"></i>
                                    </span>
                                    <input type="email" name="email" placeholder="contoh@mail.com" required
                                        value="{{ $isEdit ? $data->email : '' }}"
                                        class="w-full pl-11 pr-4 py-3 bg-white-primary border border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-primary/10 focus:border-blue-primary outline-none transition-all font-medium text-gray-700">
                                </div>
                            </div>

                            <div class="md:col-span-2 space-y-2" id="roleOption">
                                <label class="text-sm font-bold text-gray-700 ml-1">Role / Hak Akses</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                        <i class="fa-solid fa-user-tag"></i>
                                    </span>
                                    <select id="roleSelect" name="role"
                                        class="w-full pl-11 pr-4 py-3 bg-white-primary border border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-primary/10 focus:border-blue-primary outline-none transition-all font-medium text-gray-700 appearance-none">
                                        <option value="admin" {{ $isEdit  && $data->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="store_owner" {{ $isEdit && $data->role == 'store_owner' ? 'selected' : '' }}>Pemilik toko</option>
                                        <option value="user" {{ $isEdit && $data->role == 'user' ? 'selected' : '' }}>pengunjung</option>
                                    </select>
                                    <span
                                        class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                                        <i class="fa-solid fa-chevron-down text-xs"></i>
                                    </span>
                                </div>
                            </div>

                            <input type="hidden" name="old_password" value="{{ $isEdit ? $data->password : '' }}">
                            <div class="space-y-2">
                                <label class="text-sm font-bold text-gray-700 ml-1">Password</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                    <input type="password" name="password" placeholder="••••••••" required
                                        class="w-full pl-11 pr-4 py-3 bg-white-primary border border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-primary/10 focus:border-blue-primary outline-none transition-all font-medium text-gray-700">
                                </div>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-bold text-gray-700 ml-1">Konfirmasi Password</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                        <i class="fa-solid fa-shield-check"></i>
                                    </span>
                                    <input type="password" name="password_confirmation" placeholder="••••••••" required
                                        class="w-full pl-11 pr-4 py-3 bg-white-primary border border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-primary/10 focus:border-blue-primary outline-none transition-all font-medium text-gray-700">
                                </div>
                            </div>

                            <div class="md:col-span-2 space-y-2 hidden" id="storeNameField">
                                <label class="text-sm font-bold text-gray-700 ml-1">Nama Toko/Warung</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400">
                                        <i class="fa-solid fa-store"></i>
                                    </span>
                                    <input type="text" name="store_name" placeholder="Masukkan nama toko/warung..."
                                        value="{{ $isEdit ? $data->store->store_name ?? null : '' }} "
                                        class="w-full pl-11 pr-4 py-3 bg-white-primary border border-gray-100 rounded-2xl focus:ring-4 focus:ring-blue-primary/10 focus:border-blue-primary outline-none transition-all font-medium text-gray-700">
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3 mt-10 pt-6 border-t border-gray-50">
                            <a href="{{ route('management.users.index') }}"
                                class="px-6 py-3 rounded-2xl font-bold text-gray-400 hover:text-gray-600 transition-colors">Batal</a>
                            <button type="submit"
                                class="bg-green-dark-primary text-white px-10 py-3 rounded-2xl font-black shadow-lg shadow-green-dark-primary/20 hover:scale-105 transition-all active:scale-95">
                                Simpan Data User
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('js')
    <script>
        // Live Preview Image
        function previewFile() {
            const preview = document.querySelector('#previewImg');
            const file = document.querySelector('#profile_image').files[0];
            const reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "https://ui-avatars.com/api/?name=New+User&background=6892D5&color=fff&size=128";
            }
        }

        // Toggle store name input when role is store_owner
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('roleSelect');
            const storeField = document.getElementById('storeNameField');
            const storeInput = storeField ? storeField.querySelector('input[name="store_name"]') : null;

            function toggleStoreField() {
                if (!roleSelect || !storeField) return;
                if (roleSelect.value === 'store_owner') {
                    storeField.classList.remove('hidden');
                    if (storeInput) storeInput.required = true;
                    storeInput && storeInput.focus();
                } else {
                    storeField.classList.add('hidden');
                    if (storeInput) {
                        storeInput.required = false;
                        storeInput.value = '';
                    }
                }
            }

            roleSelect && roleSelect.addEventListener('change', toggleStoreField);
            toggleStoreField();
        });
    </script>
@endpush
