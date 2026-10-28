@extends('layout.app')

@section('konten')
<div class="w-full max-w-2xl mx-auto flex flex-col gap-6 py-2 sm:py-4">
    
    <!-- Tombol Kembali (Original SVG 1) -->
    <div>
        <a href="/jajan" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white/80 hover:bg-white text-[#1D2D2B] text-xs font-bold transition-all duration-300 border border-white shadow-sm hover:shadow-md hover:-translate-x-1 active:scale-95">
            <svg class="w-4 h-4 text-[#82B5B3]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span>Kembali ke Daftar Jajan</span>
        </a>
    </div>

    <!-- Container Form Card -->
    <div class="bg-white/85 border border-white rounded-3xl p-6 sm:p-8 shadow-sm backdrop-blur-md hover:shadow-md transition-all duration-300">
        
        <!-- Judul Form -->
        <div class="mb-6 pb-4 border-b border-[#82B5B3]/20">
            <h3 class="text-xl sm:text-2xl font-extrabold text-[#1D2D2B] tracking-tight">
                Edit Jajan Anda
            </h3>
            <p class="text-xs sm:text-sm text-[#2B4240]/80 mt-1 font-medium">
                Perbarui detail jajanan Anda dengan benar
            </p>
        </div>

        <form action="/jajan/simpan/{{ $jajan->id }}" method="post" class="flex flex-col gap-5">
            @csrf
            
            <!-- Input Nama Jajan -->
            <div class="flex flex-col gap-1.5">
                <label for="nama_jajan" class="text-xs font-bold text-[#82B5B3] uppercase tracking-wider">
                    Masukan Nama Jajan :
                </label>
                <input 
                    type="text" 
                    id="nama_jajan"
                    name="nama_jajan" 
                    value="{{ $jajan->nama_jajan }}" 
                    placeholder="Contoh: Seblak Special..." 
                    class="w-full px-4 py-3 rounded-xl bg-white/90 border border-[#82B5B3]/30 text-[#1D2D2B] placeholder-[#2B4240]/40 focus:outline-none focus:border-[#519872] focus:ring-2 focus:ring-[#519872]/20 transition-all text-sm font-medium shadow-xs" 
                />
                @error('nama_jajan')
                    <div class="text-xs font-bold mt-1 text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200 inline-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Input Harga Jajan -->
            <div class="flex flex-col gap-1.5">
                <label for="harga" class="text-xs font-bold text-[#82B5B3] uppercase tracking-wider">
                    Masukan Harga jajan :
                </label>
                <input 
                    type="number" 
                    id="harga"
                    name="harga" 
                    value="{{ $jajan->harga }}" 
                    placeholder="Contoh: 15000" 
                    class="w-full px-4 py-3 rounded-xl bg-white/90 border border-[#82B5B3]/30 text-[#1D2D2B] placeholder-[#2B4240]/40 focus:outline-none focus:border-[#519872] focus:ring-2 focus:ring-[#519872]/20 transition-all text-sm font-medium shadow-xs" 
                />
                @error('harga')
                    <div class="text-xs font-bold mt-1 text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200 inline-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Select Kategori Jajan -->
            <div class="flex flex-col gap-1.5">
                <label for="kategori_id" class="text-xs font-bold text-[#82B5B3] uppercase tracking-wider">
                    Masukan Kategori jajan :
                </label>
                <div class="relative">
                    <select 
                        id="kategori_id"
                        name="kategori_id" 
                        class="w-full px-4 py-3 rounded-xl bg-white/90 border border-[#82B5B3]/30 text-[#1D2D2B] focus:outline-none focus:border-[#519872] focus:ring-2 focus:ring-[#519872]/20 transition-all text-sm font-medium appearance-none cursor-pointer shadow-xs"
                    >
                        <option value="" class="bg-white text-[#82B5B3] py-2">Pilih Kategori jajan anda</option>
                        @foreach ($semuakategori as $kategori)
                            <option value="{{ $kategori->id }}" 
                                @if($kategori->id === $jajan->kategori_id) 
                                selected 
                                @endif
                                class="bg-white text-[#1D2D2B] py-2">
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    <!-- Icon panah kecil kustom (Original SVG 2) -->
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-[#82B5B3]">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Input Rasa Jajan -->
            <div class="flex flex-col gap-1.5">
                <label for="rasa_jajan" class="text-xs font-bold text-[#82B5B3] uppercase tracking-wider">
                    Masukan Rasa Jajan :
                </label>
                <input 
                    type="text" 
                    id="rasa_jajan"
                    name="rasa_jajan" 
                    value="{{ $jajan->rasa_jajan }}" 
                    placeholder="Contoh: Pedas Manis..." 
                    class="w-full px-4 py-3 rounded-xl bg-white/90 border border-[#82B5B3]/30 text-[#1D2D2B] placeholder-[#2B4240]/40 focus:outline-none focus:border-[#519872] focus:ring-2 focus:ring-[#519872]/20 transition-all text-sm font-medium shadow-xs" 
                />
                @error('rasa_jajan')
                    <div class="text-xs font-bold mt-1 text-emerald-700 bg-emerald-50 px-3 py-1.5 rounded-lg border border-emerald-200 inline-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Tombol Simpan Perubahan (Original SVG 3) -->
            <div class="pt-2">
                <button type="submit" name="simpan" class="w-full py-3.5 rounded-xl bg-[#2B4240] hover:bg-[#1D2D2B] text-white font-extrabold text-xs sm:text-sm tracking-wide transition-all duration-300 shadow-sm hover:shadow-md flex items-center justify-center gap-2 cursor-pointer active:scale-95 group">
                    <svg class="w-4 h-4 text-[#C1FFB3] group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>Simpan Perubahan Jajan</span>
                </button>
            </div>

        </form>
    </div>

</div>
@endsection