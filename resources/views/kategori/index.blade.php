@extends('layout.app')

@section('konten')
<div class="w-full flex flex-col gap-6 py-2 sm:py-4">
    
    <!-- Bagian Header Kategori & Tombol Tambah -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pb-4 border-b border-[#82B5B3]/30">
        <div class="text-center sm:text-left">
            <h1 class="text-xl sm:text-3xl font-extrabold text-[#1D2D2B] tracking-tight">
                Kategori Page
            </h1>
            <p class="text-xs sm:text-sm text-[#2B4240]/80 mt-1 font-medium">
                Daftar Kategori Jajan yang selama ini anda beli
            </p>
        </div>
        
        <!-- Tombol Tambah Kategori (Original SVG 1) -->
        <a href="/kategori/tambah" class="w-full sm:w-auto px-5 py-2.5 rounded-xl bg-[#2B4240] text-white font-extrabold text-xs sm:text-sm hover:bg-[#1D2D2B] transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center gap-2 group active:scale-95">
            <svg class="w-4 h-4 text-[#C1FFB3] group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            <span>Tambah Kategori</span>
        </a>
    </div>

    <!-- Grid Card untuk Setiap Kategori -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($semuakategori as $kategori)
            <div class="bg-white/80 border border-white rounded-2xl p-5 shadow-sm hover:shadow-md transition-all duration-300 flex flex-col justify-between gap-4 hover:-translate-y-1">
                
                <!-- Info Kategori -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-[#82B5B3] to-[#97E6CE] border border-white flex items-center justify-center text-[#1D2D2B] font-extrabold text-sm shadow-xs">
                            {{ $loop->iteration }}
                        </div>
                        <div>
                            <span class="text-[10px] text-[#82B5B3] uppercase tracking-wider font-bold">Kategori Jajan</span>
                            <h3 class="text-base sm:text-lg font-extrabold text-[#1D2D2B]">{{ $kategori->nama_kategori }}</h3>
                        </div>
                    </div>
                </div>

                <!-- Bagian Tombol Aksi -->
                <div class="pt-3 border-t border-[#82B5B3]/20 flex items-center justify-end gap-2">
                    
                    <!-- Tombol Edit (Original SVG 2) -->
                    <a href="/kategori/edit/{{ $kategori->id }}" class="px-3.5 py-1.5 rounded-xl bg-[#97E6CE]/50 hover:bg-[#97E6CE] text-[#1D2D2B] text-xs font-bold transition-all duration-200 flex items-center gap-1.5 border border-[#82B5B3]/30 active:scale-95">
                        <svg class="w-3.5 h-3.5 text-[#2B4240]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        <span>Edit</span>
                    </a>

                    <!-- Tombol Hapus (Original SVG 3) -->
                    <a href="/kategori/hapus/{{ $kategori->id }}" onclick="return confirm('Yakin ingin menghapus kategori ini?')" class="px-3.5 py-1.5 rounded-xl bg-rose-500/10 hover:bg-rose-500 text-rose-700 hover:text-white text-xs font-bold transition-all duration-200 flex items-center gap-1.5 border border-rose-200 active:scale-95">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        <span>Hapus</span>
                    </a>
                </div>

            </div>
        @endforeach
    </div>

</div>
@endsection