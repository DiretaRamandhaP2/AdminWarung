@extends('layout.main')
@section('main')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div
            class="group bg-white p-6 rounded-3xl border border-green-light-primary shadow-xs hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Pendapatan Hari Ini</p>
                    <h3 class="text-2xl font-black text-gray-800 tracking-tight">Rp 12.500.000</h3>
                    <div class="mt-2 flex items-center">
                        <span class="flex items-center text-xs font-bold text-green-500 bg-green-50 px-2 py-1 rounded-lg">
                            <i class="fa-solid fa-arrow-up mr-1 text-[10px]"></i>17%
                        </span>
                        <span class="text-[10px] text-gray-400 ml-2 font-medium">vs Kemarin</span>
                    </div>
                </div>
                <div
                    class="p-4 bg-blue-primary/10 text-blue-primary rounded-2xl group-hover:bg-blue-primary group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-wallet text-2xl"></i>
                </div>
            </div>
        </div>

        <div
            class="group bg-white p-6 rounded-3xl border border-green-light-primary shadow-xs hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Total Produk</p>
                    <h3 class="text-2xl font-black text-gray-800 tracking-tight">248 <span
                            class="text-sm font-medium text-gray-400">SKU</span></h3>
                    <div class="mt-2 flex items-center">
                        <span class="flex items-center text-xs font-bold text-blue-primary bg-blue-50 px-2 py-1 rounded-lg">
                            Aktif
                        </span>
                        <span class="text-[10px] text-gray-400 ml-2 font-medium">12 Stok Habis</span>
                    </div>
                </div>
                <div
                    class="p-4 bg-green-dark-primary/10 text-green-dark-primary rounded-2xl group-hover:bg-green-dark-primary group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-boxes-stacked text-2xl"></i>
                </div>
            </div>
        </div>

        <div
            class="group bg-white p-6 rounded-3xl border border-green-light-primary shadow-xs hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Pelanggan Baru</p>
                    <h3 class="text-2xl font-black text-gray-800 tracking-tight">42 <span
                            class="text-sm font-medium text-gray-400">Orang</span></h3>
                    <div class="mt-2 flex items-center">
                        <span class="flex items-center text-xs font-bold text-green-500 bg-green-50 px-2 py-1 rounded-lg">
                            <i class="fa-solid fa-plus mr-1 text-[10px]"></i>8
                        </span>
                        <span class="text-[10px] text-gray-400 ml-2 font-medium">Minggu ini</span>
                    </div>
                </div>
                <div
                    class="p-4 bg-yellow-400/10 text-yellow-600 rounded-2xl group-hover:bg-yellow-400 group-hover:text-white transition-colors duration-300">
                    <i class="fa-solid fa-users text-2xl"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-black text-gray-800">Analisis Penjualan</h1>
                <p class="text-sm text-gray-500 font-medium">Data performa warung periode Februari 2026</p>
            </div>
            <div class="flex gap-2">
                <button
                    class="bg-white border border-gray-200 p-2 rounded-xl hover:bg-gray-50 transition shadow-sm text-gray-600">
                    <i class="fa-solid fa-calendar-day"></i>
                </button>
                <button
                    class="bg-blue-primary text-white px-4 py-2 rounded-xl hover:bg-blue-primary/90 transition shadow-md shadow-blue-primary/20 text-sm font-bold">
                    Cetak Laporan
                </button>
            </div>
        </div>

        <section id="diagram" class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            <div
                class="lg:col-span-5 bg-white shadow-xl shadow-gray-100/50 border border-green-light-primary rounded-[2rem] p-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="font-black text-gray-800">Proporsi Kategori</h3>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Berdasarkan Volume</p>
                    </div>
                    <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-primary">
                        <i class="fa-solid fa-chart-pie"></i>
                    </div>
                </div>
                <div id="pieChart" class="w-full h-[380px] mx-auto"></div>
            </div>

            <div
                class="lg:col-span-7 bg-white shadow-xl shadow-gray-100/50 border border-green-light-primary rounded-[2rem] p-8 flex flex-col">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h3 class="font-black text-gray-800">Rincian Data Terlaris</h3>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest">Statistik Mingguan</p>
                    </div>
                    <button
                        class="flex items-center gap-2 text-xs bg-green-light-primary/50 text-green-dark-primary px-4 py-2 rounded-xl font-black hover:bg-green-dark-primary hover:text-white transition-all duration-300">
                        <i class="fa-solid fa-file-excel"></i>
                        EXPORT EXCEL
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left display" id="myTable" ">
                                <thead>
                                    <tr class="text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] border-b border-gray-50">
                                        <th class="pb-4 px-4">Kategori</th>
                                        <th class="pb-4 px-4 text-center">Persentase</th>
                                        <th class="pb-4 px-4 text-right">Perubahan</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    <tr class="group hover:bg-white-primary transition-colors duration-300">
                                        <td class="py-5 px-4">
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 rounded-full bg-blue-primary mr-3"></div>
                                                <span class="font-bold text-gray-700">Sembako</span>
                                            </div>
                                        </td>
                                        <td class="py-5 px-4 text-center">
                                            <span class="font-black text-gray-800 bg-gray-100 px-3 py-1 rounded-lg">40%</span>
                                        </td>
                                        <td class="py-5 px-4 text-right">
                                            <span class="text-green-500 font-bold flex items-center justify-end">
                                                <i class="fa-solid fa-caret-up mr-1"></i>12%
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="group hover:bg-white-primary transition-colors duration-300">
                                        <td class="py-5 px-4">
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 rounded-full bg-green-dark-primary mr-3"></div>
                                                <span class="font-bold text-gray-700">Minuman Dingin</span>
                                            </div>
                                        </td>
                                        <td class="py-5 px-4 text-center">
                                            <span class="font-black text-gray-800 bg-gray-100 px-3 py-1 rounded-lg">38%</span>
                                        </td>
                                        <td class="py-5 px-4 text-right">
                                            <span class="text-green-500 font-bold flex items-center justify-end">
                                                <i class="fa-solid fa-caret-up mr-1"></i>5%
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="group hover:bg-white-primary transition-colors duration-300">
                                        <td class="py-5 px-4">
                                            <div class="flex items-center">
                                                <div class="w-2 h-2 rounded-full bg-red-300 mr-3"></div>
                                                <span class="font-bold text-gray-700">Snack & Makanan</span>
                                            </div>
                                        </td>
                                        <td class="py-5 px-4 text-center">
                                            <span class="font-black text-gray-800 bg-gray-100 px-3 py-1 rounded-lg">32%</span>
                                        </td>
                                        <td class="py-5 px-4 text-right">
                                            <span class="text-red-400 font-bold flex items-center justify-end">
                                                <i class="fa-solid fa-caret-down mr-1"></i>2%
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
@endsection

@push('js')

            <script src="https://cdn.jsdelivr.net/npm/echarts/dist/echarts.min.js"></script>
            <script>
                var chartDom = document.getElementById('pieChart');
                var myChart = echarts.init(chartDom);

                var option = {
                    // Menggunakan palet warna AdminWarung kamu
                    color: ['#6892D5', '#79D1C3', '#A3D9CF', '#C9FDD7', '#567AB3', '#96C6BF'],
                    tooltip: {
                        trigger: 'item',
                        formatter: '{a} <br/>{b} : {c} ({d}%)'
                    },
                    legend: {
                        bottom: '0%',
                        itemWidth: 10,
                        itemHeight: 10,
                        textStyle: {
                            fontSize: 10
                        }
                    },
                    series: [{
                        name: 'Kategori Produk',
                        type: 'pie',
                        radius: [20, 140], // Ukuran disesuaikan agar pas di card
                        center: ['50%', '45%'],
                        roseType: 'radius',
                        itemStyle: {
                            borderRadius: 12
                        },
                        label: {
                            show: false // Dimatikan agar lebih clean, data ada di legend & tooltip
                        },
                        data: [{
                                value: 40,
                                name: 'Sembako'
                            },
                            {
                                value: 38,
                                name: 'Minuman'
                            },
                            {
                                value: 32,
                                name: 'Snack'
                            },
                            {
                                value: 30,
                                name: 'Rokok'
                            },
                            {
                                value: 28,
                                name: 'Obat'
                            },
                            {
                                value: 26,
                                name: 'Lainnya'
                            }
                        ]
                    }]
                };

                myChart.setOption(option);

                // Responsif saat window resize
                window.addEventListener('resize', function() {
                    myChart.resize();
                });
            </script>
@endpush
