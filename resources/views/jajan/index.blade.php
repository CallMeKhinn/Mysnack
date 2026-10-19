@extends('layout.app')

@section('konten')
<div class="w-full flex flex-col gap-6">
    
    <!-- Bagian Header Daftar Jajan & Tombol Tambah -->
    <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pb-4 border-b border-emerald-500/30">
        <div>
            <h1 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">Daftar Jajan</h1>
            <p class="text-xs text-emerald-200/80 mt-1">Kelola dan pantau seluruh jajanan favoritmu di sini</p>
        </div>
        
        <a href="/jajan/tambah" class="px-5 py-2.5 rounded-xl bg-emerald-600 text-white font-semibold text-sm hover:bg-emerald-500 transition-all shadow-lg flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Jajan
        </a>
    </div>

    <!-- Grid Card untuk Setiap Hasil Daftar Jajan -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($semuajajan as $jajan)
            <div class="bg-emerald-900/40 border border-emerald-500/20 rounded-2xl p-5 shadow-xl hover:border-emerald-400/50 transition-all flex flex-col justify-between gap-4">
                
                <!-- Info Jajan -->
                <div class="flex flex-col gap-1.5">
                    <div class="flex items-center justify-between">
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-emerald-800/80 text-emerald-200 border border-emerald-600/30">
                            {{ $jajan->kategori->nama_kategori }}
                        </span>
                        <span class="text-xs text-emerald-300/60">No. {{ $loop->iteration }}</span>
                    </div>

                    <h3 class="text-lg font-bold text-white mt-1">{{ $jajan->nama_jajan }}</h3>
                    
                    <div class="text-emerald-300/90 text-sm font-medium">
                        Rp {{ number_format($jajan->harga, 0, ',', '.') }}
                    </div>

                    <div class="text-xs text-emerald-200/70 bg-emerald-950/40 p-2 rounded-xl mt-1 border border-emerald-500/10">
                        <span class="font-semibold text-emerald-300">Rasa:</span> {{ $jajan->rasa_jajan }}
                    </div>
                </div>

                <!-- Bagian Bawah Card: Tanggal & Tombol Aksi -->
                <div class="pt-3 border-t border-emerald-500/20 flex items-center justify-between gap-2">
                    <span class="text-[10px] text-emerald-300/50">{{ $jajan->created_at }}</span>

                    <div class="flex items-center gap-2">
                        <!-- Tombol Edit -->
                        <a href="/jajan/edit/{{ $jajan->id }}" class="px-3 py-1.5 rounded-lg bg-emerald-700 hover:bg-emerald-600 text-white text-xs font-medium transition-all flex items-center gap-1 shadow">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Edit
                        </a>

                        <!-- Tombol Hapus -->
                        <a href="/jajan/hapus/{{ $jajan->id }}" onclick="return confirm('Yakin ingin menghapus jajan ini?')" class="px-3 py-1.5 rounded-lg bg-red-600/80 hover:bg-red-600 text-white text-xs font-medium transition-all flex items-center gap-1 shadow">
                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus
                        </a>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

</div>
@endsection