@extends('layout.app')

@section('konten')
<div class="w-full flex flex-col gap-6 sm:gap-8 py-2 sm:py-4">
    
    <!-- Header Statistik -->
    <div class="text-center sm:text-left pb-4 border-b border-[#82B5B3]/30">
        <h1 class="text-xl sm:text-3xl font-extrabold text-[#1D2D2B] tracking-tight">
            Statistik Jajan Yang Sudah Dibeli
        </h1>
        <p class="text-xs sm:text-sm text-[#2B4240]/80 mt-1 font-medium">
            Laporan lengkap dan analitik pengeluaran jajanan harian Anda
        </p>
    </div>

    <!-- Ringkasan Card (Total Biaya, Banyak Jajan, Total Kategori) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5">
        
        <!-- Card 1: Total Biaya Jajan -->
        <div class="bg-white/80 border border-white rounded-2xl p-5 sm:p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between hover:-translate-y-1">
            <div class="flex items-center justify-between text-[#2B4240] mb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-[#82B5B3]">Total Biaya Jajan</span>
                <div class="w-9 h-9 rounded-xl bg-[#C1FFB3]/50 flex items-center justify-center text-[#1D2D2B]">
                    <!-- ORIGINAL SVG 1 -->
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-extrabold text-[#1D2D2B]">
                Rp {{ number_format($totalbiayajajan ?? 0, 0, ',', '.') }}
            </div>
            <span class="text-[11px] text-[#2B4240]/70 font-medium mt-2">Akumulasi seluruh pengeluaran jajan</span>
        </div>

        <!-- Card 2: Banyaknya Jajan Saya -->
        <div class="bg-[#2B4240] text-white rounded-2xl p-5 sm:p-6 shadow-md hover:shadow-lg transition-all duration-300 flex flex-col justify-between hover:-translate-y-1">
            <div class="flex items-center justify-between text-[#C1FFB3] mb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-[#97E6CE]">Banyaknya Jajan Saya</span>
                <div class="w-9 h-9 rounded-xl bg-white/10 flex items-center justify-center text-[#C1FFB3]">
                    <!-- ORIGINAL SVG 2 -->
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-extrabold text-white">
                {{ $banyaknyajajansaya ?? 0 }} <span class="text-sm font-semibold text-[#A3FFD1]">Item</span>
            </div>
            <span class="text-[11px] text-[#A3FFD1]/80 font-medium mt-2">Total produk jajan yang tercatat</span>
        </div>

        <!-- Card 3: Semua Kategori Jajan -->
        <div class="bg-white/80 border border-white rounded-2xl p-5 sm:p-6 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between sm:col-span-2 lg:col-span-1 hover:-translate-y-1">
            <div class="flex items-center justify-between text-[#2B4240] mb-3">
                <span class="text-xs font-bold uppercase tracking-wider text-[#82B5B3]">Kategori Jajan</span>
                <div class="w-9 h-9 rounded-xl bg-[#97E6CE]/50 flex items-center justify-center text-[#1D2D2B]">
                    <!-- ORIGINAL SVG 3 -->
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2h-5l-2-2H6c-1.1 0-2 .9-2 2z"/>
                    </svg>
                </div>
            </div>
            <div class="text-2xl sm:text-3xl font-extrabold text-[#1D2D2B]">
                {{ $semuakategori->count() }} <span class="text-sm font-semibold text-[#82B5B3]">Kategori</span>
            </div>
            <span class="text-[11px] text-[#2B4240]/70 font-medium mt-2">Jenis pengelompokan jajan aktif</span>
        </div>

    </div>

    <!-- Bagian Grafik: Kurva Harian & Diagram Lingkaran Kategori -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 sm:gap-6 mt-2">
        
        <!-- Kurva 1: Pembelian dari Hari ke Hari -->
        <div class="bg-white/85 border border-white rounded-3xl p-5 sm:p-6 shadow-sm flex flex-col gap-4">
            <div class="flex items-center justify-between border-b border-[#82B5B3]/20 pb-3">
                <h3 class="text-sm sm:text-base font-extrabold text-[#1D2D2B] flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#82B5B3] inline-block animate-ping"></span>
                    Kurva Pembelian dari Hari ke Hari
                </h3>
                <span class="text-[10px] font-bold bg-[#C1FFB3]/60 px-2.5 py-1 rounded-full text-[#1D2D2B] border border-white">
                    Tren Harian
                </span>
            </div>
            <div class="relative w-full h-[250px] sm:h-[280px]">
                <canvas id="kurvaHari"></canvas>
            </div>
        </div>

        <!-- Kurva 2: Diagram Lingkaran Kategori Jajan -->
        <div class="bg-white/85 border border-white rounded-3xl p-5 sm:p-6 shadow-sm flex flex-col gap-4">
            <div class="flex items-center justify-between border-b border-[#82B5B3]/20 pb-3">
                <h3 class="text-sm sm:text-base font-extrabold text-[#1D2D2B] flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#519872] inline-block animate-ping"></span>
                    Distribusi Kategori Jajan
                </h3>
                <span class="text-[10px] font-bold bg-[#A3FFD1]/60 px-2.5 py-1 rounded-full text-[#1D2D2B] border border-white">
                    Diagram Lingkaran
                </span>
            </div>
            <div class="relative w-full h-[250px] sm:h-[280px] flex items-center justify-center">
                <canvas id="kurvaKategori"></canvas>
            </div>
        </div>

    </div>

    <!-- Rincian Kategori Card Grid -->
    <div class="mt-2">
        <h3 class="text-base sm:text-lg font-extrabold text-[#1D2D2B] mb-4 flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-[#82B5B3]"></span>
            Rincian Per Kategori
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3.5">
            @foreach ($semuakategori as $kategori)
                <div class="bg-white/80 border border-white rounded-2xl p-4 shadow-sm hover:shadow-md transition-all duration-300 flex items-center justify-between hover:-translate-y-1">
                    <div>
                        <span class="text-[10px] text-[#82B5B3] uppercase font-bold tracking-wider">Kategori</span>
                        <h4 class="text-sm font-extrabold text-[#1D2D2B]">{{ $kategori->nama_kategori }}</h4>
                    </div>
                    <div class="px-3 py-1.5 rounded-xl bg-[#2B4240] text-[#C1FFB3] text-xs font-extrabold shadow-xs">
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
                borderColor: '#2B4240',
                backgroundColor: 'rgba(130, 181, 179, 0.25)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointBackgroundColor: '#82B5B3',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { 
                legend: { 
                    labels: { color: '#1D2D2B', font: { family: 'Plus Jakarta Sans', weight: '600' } } 
                } 
            },
            scales: {
                x: { ticks: { color: '#2B4240' }, grid: { color: 'rgba(130, 181, 179, 0.15)' } },
                y: { ticks: { color: '#2B4240' }, grid: { color: 'rgba(130, 181, 179, 0.15)' } }
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
                    '#82B5B3', '#97E6CE', '#A3FFD1', '#2B4240', '#6B9E9C', '#C1FFB3', '#3B5249'
                ],
                borderWidth: 2,
                borderColor: '#FFFFFF'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { 
                legend: { 
                    position: 'bottom',
                    labels: { color: '#1D2D2B', boxWidth: 12, font: { family: 'Plus Jakarta Sans', weight: '600' } } 
                } 
            }
        }
    });
</script>
@endsection