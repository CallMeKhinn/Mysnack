@extends('layout.app')

@section('konten')
<div class="w-full flex flex-col items-center text-center py-6 px-4 gap-8">
    
    <!-- Hero / Sambutan Utama -->
    <div class="max-w-2xl flex flex-col items-center gap-4">
        <!-- Icon Hiasan Atas -->
        <div class="w-16 h-16 rounded-2xl bg-emerald-800/60 border border-emerald-500/30 flex items-center justify-center text-emerald-300 shadow-xl">
            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
        </div>

        <h1 class="text-3xl md:text-4xl font-black text-white tracking-tight">Selamat Datang di Home</h1>
        
        <p class="text-sm md:text-base text-emerald-100/90 leading-relaxed max-w-xl">
            Ini adalah halaman utama dari aplikasi jajan. Silakan Anda pergi ke halaman daftar jajan untuk menambah dan mengelola jajan Anda.
        </p>
    </div>

    <!-- Tombol Aksi Cepat (Call to Action) -->
    <div class="flex flex-wrap justify-center gap-4">
        <a href="/jajan" class="px-6 py-3.5 rounded-xl bg-white text-emerald-950 font-extrabold text-sm hover:bg-emerald-50 transition-all shadow-xl flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
            </svg>
            Lihat Daftar Jajan
        </a>
        
        <a href="/jajan/tambah" class="px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm transition-all shadow-lg shadow-emerald-900/50 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Jajan Baru
        </a>
    </div>

    <!-- Informasi Singkat / Fitur Unggulan di Beranda -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full max-w-4xl mt-6">
        <div class="bg-emerald-900/30 border border-emerald-500/20 p-5 rounded-2xl flex flex-col items-center text-center gap-2">
            <div class="text-emerald-300 font-bold text-lg">📝 Catat Rapi</div>
            <p class="text-xs text-emerald-200/70">Kelola semua jajanan harianmu berdasarkan kategori dan rasa dengan mudah.</p>
        </div>

        <div class="bg-emerald-900/30 border border-emerald-500/20 p-5 rounded-2xl flex flex-col items-center text-center gap-2">
            <div class="text-emerald-300 font-bold text-lg">📊 Pantau Harga</div>
            <p class="text-xs text-emerald-200/70">Ketahuin rincian pengeluaran jajan secara berkala melalui menu rekap.</p>
        </div>

        <div class="bg-emerald-900/30 border border-emerald-500/20 p-5 rounded-2xl flex flex-col items-center text-center gap-2">
            <div class="text-emerald-300 font-bold text-lg">⚡ Akses Cepat</div>
            <p class="text-xs text-emerald-200/70">Navigasi praktis di atas untuk berpindah menu tanpa hambatan.</p>
        </div>
    </div>

</div>
@endsection