<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Jajan Mysnack</title>
    
    <!-- Favicon Icon: Tangan Memegang Minuman -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23064e3b'><path d='M5 3h14v2H5V3m2 4h10v2H7V7m2 4h6v2H9v-2m-2 4h10v6H7v-6z'/></svg>">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    
    <style>
        body {
            background: linear-gradient(135deg, #d3c79c, #047442, #E2CEB1);
            min-height: 100vh;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #fef3c7;
            margin: 0;
            padding: 0;
        }

        .main-container {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4), 0 0 30px rgba(16, 185, 129, 0.2);
        }

        .btn-card {
            transition: all 0.25s ease-in-out;
        }
        .btn-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(16, 185, 129, 0.4);
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- NAVBAR ATAS (Penuh membentang di atas sebagai Navbar, tidak menempel dengan container) -->
    <nav class="w-full bg-emerald-950/90 backdrop-blur-md px-6 py-3 border-b border-emerald-500/30 shadow-lg sticky top-0 z-50 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <svg class="w-6 h-6 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            <span class="font-bold text-white tracking-wide">Mysnack</span>
        </div>
        
        <div class="flex items-center gap-2">
            <a href="/" class="px-3 py-1.5 rounded-xl bg-emerald-600 text-white text-xs font-semibold hover:bg-emerald-500 flex items-center gap-1 transition-all">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Home
            </a>
            <a href="/jajan" class="px-3 py-1.5 rounded-xl bg-white text-emerald-950 text-xs font-bold hover:bg-emerald-50 flex items-center gap-1 transition-all">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                Daftar
            </a>
            <a href="/kategori" class="px-3 py-1.5 rounded-xl bg-emerald-900 text-emerald-100 text-xs font-medium hover:bg-emerald-800 flex items-center gap-1 transition-all">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2h-5l-2-2H6c-1.1 0-2 .9-2 2z"/></svg>
                Kategori
            </a>
            <a href="/rekap" class="px-3 py-1.5 rounded-xl bg-amber-100 text-emerald-950 text-xs font-bold hover:bg-amber-200 flex items-center gap-1 transition-all">
                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                Rekap
            </a>
        </div>
    </nav>

    <!-- Konten Utama di dalam Body -->
    <div class="flex-grow flex flex-col p-4 md:p-8 justify-center items-center">
        <main class="main-container w-full max-w-6xl rounded-3xl p-6 md:p-10 flex flex-col justify-between relative overflow-hidden">
            
            <!-- Header Judul Tengah -->
            <div class="text-center pb-6 border-b border-emerald-500/30 mb-8">
                <div class="inline-flex items-center gap-2 mb-1">
                    <svg class="w-8 h-8 text-emerald-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h1 class="text-3xl md:text-4xl font-black text-white tracking-tight">Mysnack</h1>
                </div>
                <p class="text-xs md:text-sm text-emerald-200/80">Platform pencatatan jajan favoritmu</p>
            </div>

            <!-- Tombol Menu Utama Card -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                
                <a href="/" class="btn-card p-4 rounded-2xl bg-emerald-700 text-white flex flex-col items-center text-center border border-emerald-500/30">
                    <div class="flex items-center gap-2 font-bold text-base mb-1">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                        Beranda
                    </div>
                    <span class="text-xs text-emerald-100/80">Halaman utama aplikasi anda</span>
                </a>

                <a href="/jajan" class="btn-card p-4 rounded-2xl bg-white text-emerald-950 flex flex-col items-center text-center shadow-lg">
                    <div class="flex items-center gap-2 font-extrabold text-base mb-1">
                        <svg class="w-5 h-5 text-emerald-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
                        Daftar Jajan Saya
                    </div>
                    <span class="text-xs text-emerald-800/80 font-medium">Lihat dan tambah jajanan anda</span>
                </a>

                <a href="/kategori" class="btn-card p-4 rounded-2xl bg-emerald-900 text-emerald-100 flex flex-col items-center text-center border border-emerald-600/40">
                    <div class="flex items-center gap-2 font-bold text-base mb-1">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2h-5l-2-2H6c-1.1 0-2 .9-2 2z"/></svg>
                        Kategori Jajan
                    </div>
                    <span class="text-xs text-emerald-200/80">Kelompokkan jenis jajan anda</span>
                </a>

                <a href="/rekap" class="btn-card p-4 rounded-2xl bg-amber-100 text-emerald-950 flex flex-col items-center text-center shadow-lg">
                    <div class="flex items-center gap-2 font-extrabold text-base mb-1">
                        <svg class="w-5 h-5 text-emerald-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        Rekap Jajan
                    </div>
                    <span class="text-xs text-emerald-900/80">Perbarui jajanan dan laporan</span>
                </a>

            </div>

            <!-- Area Konten/Yield Blade -->
            <div class="w-full bg-emerald-950/50 rounded-2xl p-6 md:p-8 border border-emerald-500/20 text-white flex flex-col items-center justify-center text-center min-h-[250px]">
                
                <div class="flex items-center justify-center gap-2 mb-3">
                    <svg class="w-6 h-6 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-xl font-bold text-emerald-200 tracking-wide">INFORMASI UTAMA</h2>
                </div>

                <div class="w-full">
                    @yield('konten')
                </div>

            </div>

            <!-- Footer Kecil -->
            <div class="mt-8 pt-4 border-t border-emerald-500/20 text-center text-xs text-emerald-300/60 flex flex-col md:flex-row justify-between items-center gap-2">
                <span>&copy; 2026 Mysnack Application. Created By: Bahi</span>
                <span class="text-emerald-300/40">Sistem Pengelolaan Jajan Harian</span>
            </div>

        </main>
    </div>

</body>
</html>