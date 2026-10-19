@extends('layout.app')

@section('konten')
<div class="w-full flex flex-col gap-8 py-4">
    
    <!-- Header Statistik -->
    <div class="text-center md:text-left pb-4 border-b border-emerald-500/30">
        <h1 class="text-2xl md:text-3xl font-black text-white tracking-tight">Statistik Jajan Yang Sudah Dibeli</h1>
        <p class="text-xs text-emerald-200/80 mt-1">Laporan lengkap dan analitik pengeluaran jajanan harian Anda</p>
    </div>

    <!-- Ringkasan Card (Total Biaya, Banyak Jajan, Total Kategori) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        
        <!-- Card 1: Total Biaya Jajan -->
        <div class="bg-emerald-900/40 border border-emerald-500/30 rounded-2xl p-6 shadow-xl flex flex-col justify-between">
            <div class="flex items-center justify-between text-emerald-300 mb-2">
                <span class="text-xs font-bold uppercase tracking-wider">Total Biaya Jajan</span>
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="text-2xl font-black text-white">
                Rp {{ number_format($totalbiayajajan ?? 0, 0, ',', '.') }}
            </div>
            <span class="text-[10px] text-emerald-300/60 mt-1">Akumulasi seluruh pengeluaran jajan</span>
        </div>

        <!-- Card 2: Banyaknya Jajan Saya -->
        <div class="bg-white text-emerald-950 rounded-2xl p-6 shadow-xl flex flex-col justify-between">
            <div class="flex items-center justify-between text-emerald-800 mb-2">
                <span class="text-xs font-bold uppercase tracking-wider">Banyaknya Jajan Saya</span>
                <svg class="w-6 h-6 text-emerald-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <div class="text-2xl font-black">
                {{ $banyaknyajajansaya ?? 0 }} <span class="text-sm font-semibold">Item</span>
            </div>
            <span class="text-[10px] text-emerald-800/60 mt-1">Total produk jajan yang tercatat</span>
        </div>

        <!-- Card 3: Semua Kategori Jajan -->
        <div class="bg-emerald-900/40 border border-emerald-500/30 rounded-2xl p-6 shadow-xl flex flex-col justify-between">
            <div class="flex items-center justify-between text-emerald-300 mb-2">
                <span class="text-xs font-bold uppercase tracking-wider">Kategori Jajan</span>
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2h-5l-2-2H6c-1.1 0-2 .9-2 2z"/></svg>
            </div>
            <div class="text-2xl font-black text-white">
                {{ $semuakategori->count() }} <span class="text-sm font-semibold">Kategori</span>
            </div>
            <span class="text-[10px] text-emerald-300/60 mt-1">Jenis pengelompokan jajan aktif</span>
        </div>

    </div>

    <!-- Bagian Grafik: Kurva Harian & Diagram Lingkaran Kategori -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-4">
        
        <!-- Kurva 1: Pembelian dari Hari ke Hari -->
        <div class="bg-emerald-950/60 border border-emerald-500/30 rounded-3xl p-6 shadow-xl flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <h3 class="text-base font-bold text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-pink-500 inline-block animate-pulse"></span>
                    Kurva Pembelian dari Hari ke Hari
                </h3>
                <span class="text-[10px] bg-emerald-900/80 px-2.5 py-1 rounded-full text-emerald-300 border border-emerald-500/30">Tren Harian</span>
            </div>
            <div class="relative w-full h-[280px]">
                <canvas id="kurvaHari"></canvas>
            </div>
        </div>

        <!-- Kurva 2: Diagram Lingkaran Kategori Jajan -->
        <div class="bg-emerald-950/60 border border-emerald-500/30 rounded-3xl p-6 shadow-xl flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <h3 class="text-base font-bold text-white flex items-center gap-2">
                    <span class="w-3 h-3 rounded-full bg-cyan-400 inline-block animate-pulse"></span>
                    Distribusi Kategori Jajan
                </h3>
                <span class="text-[10px] bg-emerald-900/80 px-2.5 py-1 rounded-full text-emerald-300 border border-emerald-500/30">Diagram Lingkaran</span>
            </div>
            <div class="relative w-full h-[280px] flex items-center justify-center">
                <canvas id="kurvaKategori"></canvas>
            </div>
        </div>

    </div>

    <!-- Rincian Kategori Card Grid -->
    <div class="mt-4">
        <h3 class="text-lg font-bold text-white mb-4">Rincian Per Kategori</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach ($semuakategori as $kategori)
                <div class="bg-emerald-900/30 border border-emerald-500/20 rounded-2xl p-4 shadow-lg flex items-center justify-between">
                    <div>
                        <span class="text-[10px] text-emerald-300/60 uppercase font-semibold">Kategori</span>
                        <h4 class="text-sm font-bold text-white">{{ $kategori->nama_kategori }}</h4>
                    </div>
                    <div class="px-3 py-1.5 rounded-xl bg-emerald-800/80 text-emerald-200 text-xs font-black border border-emerald-500/30">
                        {{ $kategori->jajans->count() }} Item
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

<!-- CDN Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Kurva Pembelian Harian
    const ctxHari = document.getElementById('kurvaHari').getContext('2d');
    new Chart(ctxHari, {
        type: 'line',
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                label: 'Jumlah Transaksi',
                data: [2, 4, 3, 5, 6, 8, 7],
                borderColor: '#ec4899',
                backgroundColor: 'rgba(236, 72, 153, 0.2)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { labels: { color: '#fef3c7' } } },
            scales: {
                x: { ticks: { color: '#fef3c7' }, grid: { color: 'rgba(255,255,255,0.1)' } },
                y: { ticks: { color: '#fef3c7' }, grid: { color: 'rgba(255,255,255,0.1)' } }
            }
        }
    });

    // Diagram Lingkaran (Pie Chart) untuk Kategori Jajan
    const ctxKategori = document.getElementById('kurvaKategori').getContext('2d');
    new Chart(ctxKategori, {
        type: 'doughnut',
        data: {
            labels: [
                @foreach($semuakategori as $k)
                    '{{ $k->nama_kategori }}',
                @endforeach
            ],
            datasets: [{
                data: [
                    @foreach($semuakategori as $k)
                        {{ $k->jajans->count() }},
                    @endforeach
                ],
                backgroundColor: [
                    '#ff042e', '#38bdf8', '#f472b6', '#fbbf24', '#a78bfa', '#fb7185', '#34d399'
                ],
                borderWidth: 2,
                borderColor: '#022c22'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { 
                legend: { 
                    position: 'bottom',
                    labels: { color: '#fef3c7', boxWidth: 12 } 
                } 
            }
        }
    });
</script>
@endsection