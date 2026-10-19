@extends('layout.app')

@section('konten')
<div class="w-full max-w-2xl mx-auto flex flex-col gap-6">
    
    <!-- Tombol Kembali -->
    <div>
        <a href="/jajan" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl bg-emerald-900/60 hover:bg-emerald-800 text-emerald-200 text-xs font-semibold transition-all border border-emerald-500/20 shadow">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Kembali ke Daftar Jajan
        </a>
    </div>

    <!-- Container Form Card -->
    <div class="bg-emerald-900/30 border border-emerald-500/20 rounded-3xl p-6 md:p-8 shadow-2xl backdrop-blur-md">
        
        <!-- Judul Form -->
        <div class="mb-6 pb-4 border-b border-emerald-500/20">
            <h3 class="text-2xl font-black text-white tracking-tight">Edit Jajan Anda</h3>
            <p class="text-xs text-emerald-200/70 mt-1">Perbarui detail jajanan Anda dengan benar</p>
        </div>

        <form action="/jajan/simpan/{{ $jajan->id }}" method="post" class="flex flex-col gap-5">
            @csrf
            
            <!-- Input Nama Jajan -->
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-bold text-emerald-200 uppercase tracking-wider">Masukan Nama Jajan :</label>
                <input type="text" name="nama_jajan" value="{{ $jajan->nama_jajan }}" placeholder="Contoh: Seblak Special..." class="w-full px-4 py-3 rounded-xl bg-emerald-950/60 border border-emerald-500/30 text-white placeholder-emerald-400/40 focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all text-sm" />
                @error('nama_jajan')
                    <div style="color: green;" class="text-xs font-medium mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Input Harga Jajan -->
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-bold text-emerald-200 uppercase tracking-wider">Masukan Harga jajan :</label>
                <input type="number" name="harga" value="{{ $jajan->harga }}" placeholder="Contoh: 15000" class="w-full px-4 py-3 rounded-xl bg-emerald-950/60 border border-emerald-500/30 text-white placeholder-emerald-400/40 focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all text-sm" />
                @error('harga')
                    <div style="color: green;" class="text-xs font-medium mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Select Kategori Jajan -->
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-bold text-emerald-200 uppercase tracking-wider">Masukan Kategori jajan :</label>
                <div class="relative">
                    <select name="kategori_id" class="w-full px-4 py-3 rounded-xl bg-[#022c22] border border-emerald-500/30 text-emerald-100 focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all text-sm appearance-none cursor-pointer">
                        <option value="" class="bg-[#022c22] text-emerald-300 py-3">Pilih Kategori jajan anda</option>
                        @foreach ($semuakategori as $kategori)
                            <option value="{{ $kategori->id }}" 
                                @if($kategori->id === $jajan->kategori_id) 
                                selected 
                                @endif
                                class="bg-[#022c22] text-white py-3 my-1">
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    <!-- Icon panah kecil kustom -->
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-emerald-300">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Input Rasa Jajan -->
            <div class="flex flex-col gap-1.5">
                <label class="text-xs font-bold text-emerald-200 uppercase tracking-wider">Masukan Rasa Jajan :</label>
                <input type="text" name="rasa_jajan" value="{{ $jajan->rasa_jajan }}" placeholder="Contoh: Pedas Manis..." class="w-full px-4 py-3 rounded-xl bg-emerald-950/60 border border-emerald-500/30 text-white placeholder-emerald-400/40 focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all text-sm" />
                @error('rasa_jajan')
                    <div style="color: green;" class="text-xs font-medium mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Simpan Perubahan -->
            <div class="pt-2">
                <button type="submit" name="simpan" class="w-full py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-sm tracking-wide transition-all shadow-lg shadow-emerald-900/50 flex items-center justify-center gap-2 cursor-pointer">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    Simpan Perubahan Jajan
                </button>
            </div>

        </form>
    </div>

</div>
@endsection