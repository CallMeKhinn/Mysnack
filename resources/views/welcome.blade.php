@extends('layout.app')

@section('konten')
<div class="w-full flex flex-col items-center text-center py-4 sm:py-6 px-2 sm:px-4 gap-6 sm:gap-8">
    
    <!-- Hero / Sambutan Utama -->
    <div class="max-w-2xl flex flex-col items-center gap-3 sm:gap-4">
        
        <!-- Icon Hiasan Atas (Original SVG) -->
        <div class="w-16 h-16 sm:w-20 sm:h-20 rounded-2xl bg-gradient-to-tr from-[#82B5B3] to-[#97E6CE] border border-white flex items-center justify-center text-[#1D2D2B] shadow-md hover:scale-105 transition-all duration-300">
            <svg class="w-8 h-8 sm:w-10 sm:h-10 text-[#1D2D2B]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
        </div>

        <h1 class="text-2xl sm:text-4xl font-extrabold text-[#1D2D2B] tracking-tight">
            Selamat Datang di Home
        </h1>
        
        <p class="text-xs sm:text-base text-[#2B4240]/80 leading-relaxed max-w-xl font-medium">
            Ini adalah halaman utama dari aplikasi jajan. Silakan Anda pergi ke halaman daftar jajan untuk menambah dan mengelola jajan Anda.
        </p>
    </div>

    <!-- Tombol Aksi Cepat (Call to Action) -->
    <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4 w-full max-w-md sm:max-w-none">
        
        <!-- Button 1 (Original SVG) -->
        <a href="/jajan" class="w-full sm:w-auto px-6 py-3.5 rounded-xl bg-[#2B4240] text-white font-extrabold text-xs sm:text-sm hover:bg-[#1D2D2B] transition-all duration-300 shadow-md hover:shadow-lg flex items-center justify-center gap-2 group active:scale-95">
            <svg class="w-4 h-4 text-[#C1FFB3] group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
            </svg>
            <span>Lihat Daftar Jajan</span>
        </a>
        
        <!-- Button 2 (Original SVG) -->
        <a href="/jajan/tambah" class="w-full sm:w-auto px-6 py-3.5 rounded-xl bg-white text-[#1D2D2B] font-bold text-xs sm:text-sm border border-[#82B5B3]/30 hover:bg-[#C1FFB3]/30 transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center gap-2 group active:scale-95">
            <svg class="w-4 h-4 text-[#82B5B3] group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            <span>Tambah Jajan Baru</span>
        </a>
    </div>

    <!-- Informasi Singkat / Fitur Unggulan di Beranda -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 w-full max-w-4xl mt-4 sm:mt-6">
        
        <div class="bg-white/80 border border-white p-5 rounded-2xl flex flex-col items-center text-center gap-2 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
            <div class="w-10 h-10 rounded-xl bg-[#C1FFB3]/50 flex items-center justify-center text-base mb-1">📝</div>
            <div class="text-[#1D2D2B] font-extrabold text-sm sm:text-base">Catat Rapi</div>
            <p class="text-xs text-[#2B4240]/70 leading-relaxed font-medium">Kelola semua jajanan harianmu berdasarkan kategori dan rasa dengan mudah.</p>
        </div>

        <div class="bg-white/80 border border-white p-5 rounded-2xl flex flex-col items-center text-center gap-2 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
            <div class="w-10 h-10 rounded-xl bg-[#A3FFD1]/50 flex items-center justify-center text-base mb-1">📊</div>
            <div class="text-[#1D2D2B] font-extrabold text-sm sm:text-base">Pantau Harga</div>
            <p class="text-xs text-[#2B4240]/70 leading-relaxed font-medium">Ketahuin rincian pengeluaran jajan secara berkala melalui menu rekap.</p>
        </div>

        <div class="col-span-1 sm:col-span-2 md:col-span-1 bg-white/80 border border-white p-5 rounded-2xl flex flex-col items-center text-center gap-2 shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
            <div class="w-10 h-10 rounded-xl bg-[#97E6CE]/50 flex items-center justify-center text-base mb-1">⚡</div>
            <div class="text-[#1D2D2B] font-extrabold text-sm sm:text-base">Akses Cepat</div>
            <p class="text-xs text-[#2B4240]/70 leading-relaxed font-medium">Navigasi praktis di atas untuk berpindah menu tanpa hambatan.</p>
        </div>

    </div>

</div>
@endsection