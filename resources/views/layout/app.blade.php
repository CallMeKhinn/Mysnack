<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Aplikasi Jajan Mysnack</title>
    
    <!-- Favicon Icon: Tangan Memegang Minuman (Original) -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%2382B5B3'><path d='M5 3h14v2H5V3m2 4h10v2H7V7m2 4h6v2H9v-2m-2 4h10v6H7v-6z'/></svg>">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Google: Plus Jakarta Sans & Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'Inter', 'system-ui', '-apple-system', 'sans-serif'],
                    },
                    colors: {
                        'snack-mint': '#C1FFB3',
                        'snack-lightgreen': '#A3FFD1',
                        'snack-teal': '#97E6CE',
                        'snack-sage': '#82B5B3',
                        'snack-dark': '#2B4240',
                        'snack-deep': '#1D2D2B',
                    },
                    animation: {
                        'float-slow': 'floating 6s ease-in-out infinite',
                        'float-medium': 'floating 4s ease-in-out infinite',
                        'pulse-subtle': 'pulseSubtle 3s ease-in-out infinite',
                    },
                    keyframes: {
                        floating: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        pulseSubtle: {
                            '0%, 100%': { opacity: '0.6', transform: 'scale(1)' },
                            '50%': { opacity: '0.9', transform: 'scale(1.04)' },
                        }
                    }
                }
            }
        }
    </script>

    <style type="text/tailwindcss">
        @layer utilities {
            /* Smooth transitions */
            .app-transition {
                transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            }
            /* Cross-platform Glassmorphism & Soft Shadows */
            .glass-panel {
                background: rgba(255, 255, 255, 0.82);
                -webkit-backdrop-filter: blur(16px);
                backdrop-filter: blur(16px);
                border: 1px solid rgba(255, 255, 255, 0.6);
                box-shadow: 0 20px 40px -15px rgba(130, 181, 179, 0.25), 0 8px 16px -8px rgba(43, 66, 64, 0.08);
            }
            .glass-card {
                background: rgba(255, 255, 255, 0.7);
                -webkit-backdrop-filter: blur(10px);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.8);
            }
            .snack-shadow {
                box-shadow: 0 12px 28px -8px rgba(130, 181, 179, 0.35);
            }
            .snack-shadow-hover:hover {
                box-shadow: 0 18px 36px -10px rgba(130, 181, 179, 0.5), 0 0 20px rgba(193, 255, 179, 0.4);
            }
        }

        /* Responsive Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #97E6CE;
        }
        ::-webkit-scrollbar-thumb {
            background: #82B5B3;
            border-radius: 99px;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#C1FFB3] via-[#A3FFD1] to-[#97E6CE] min-h-screen flex flex-col font-sans text-snack-dark selection:bg-snack-sage selection:text-white relative overflow-x-hidden">

    <!-- Ambient Floating Background Blobs (Soft Glow) -->
    <div class="fixed top-[-10%] left-[-10%] w-[450px] sm:w-[600px] h-[450px] sm:h-[600px] bg-[#FFFFFF]/40 rounded-full blur-[100px] pointer-events-none animate-pulse-subtle"></div>
    <div class="fixed bottom-[-10%] right-[-10%] w-[500px] sm:w-[650px] h-[500px] sm:h-[650px] bg-[#82B5B3]/25 rounded-full blur-[120px] pointer-events-none animate-pulse-subtle" style="animation-delay: 1.5s;"></div>

    <!-- NAVBAR ATAS (Fully Responsive Navigation) -->
    <nav class="w-full bg-[#FFFFFF]/85 backdrop-blur-md px-4 sm:px-8 py-3.5 border-b border-[#FFFFFF] shadow-sm sticky top-0 z-50 flex items-center justify-between app-transition">
        
        <!-- Logo Mysnack -->
        <div class="flex items-center gap-2.5 group cursor-pointer">
            <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-snack-sage to-snack-teal flex items-center justify-center text-snack-deep shadow-md group-hover:scale-105 app-transition">
                <!-- ICON ORIGINAL 1 -->
                <svg class="w-6 h-6 text-snack-deep" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <div class="flex flex-col">
                <span class="font-extrabold text-snack-deep text-lg tracking-tight leading-none">Mysnack</span>
                <span class="text-[10px] font-semibold text-snack-sage uppercase tracking-wider">Catatan Jajan</span>
            </div>
        </div>
        
        <!-- Nav Menu Items (Scrollable on small phones) -->
        <div class="flex items-center gap-1.5 sm:gap-2 overflow-x-auto no-scrollbar py-1">
            
            <!-- Home -->
            <a href="/" class="px-3 sm:px-4 py-2 rounded-xl bg-snack-dark text-white text-xs font-bold hover:bg-snack-deep flex items-center gap-1.5 shadow-sm hover:shadow-md app-transition flex-shrink-0 active:scale-95">
                <!-- ICON ORIGINAL 2 -->
                <svg class="w-4 h-4 text-snack-mint" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Home</span>
            </a>

            <!-- Daftar -->
            <a href="/jajan" class="px-3 sm:px-4 py-2 rounded-xl bg-white text-snack-dark text-xs font-bold border border-snack-sage/20 hover:bg-snack-mint/30 flex items-center gap-1.5 shadow-sm app-transition flex-shrink-0 active:scale-95">
                <!-- ICON ORIGINAL 3 -->
                <svg class="w-4 h-4 text-snack-sage" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                </svg>
                <span>Daftar</span>
            </a>

            <!-- Kategori -->
            <a href="/kategori" class="px-3 sm:px-4 py-2 rounded-xl bg-white text-snack-dark text-xs font-bold border border-snack-sage/20 hover:bg-snack-mint/30 flex items-center gap-1.5 shadow-sm app-transition flex-shrink-0 active:scale-95">
                <!-- ICON ORIGINAL 4 -->
                <svg class="w-4 h-4 text-snack-sage" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2h-5l-2-2H6c-1.1 0-2 .9-2 2z"/>
                </svg>
                <span>Kategori</span>
            </a>

            <!-- Rekap -->
            <a href="/rekap" class="px-3 sm:px-4 py-2 rounded-xl bg-snack-sage text-snack-deep text-xs font-bold hover:bg-snack-teal flex items-center gap-1.5 shadow-sm app-transition flex-shrink-0 active:scale-95">
                <!-- ICON ORIGINAL 5 -->
                <svg class="w-4 h-4 text-snack-deep" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                <span>Rekap</span>
            </a>

        </div>
    </nav>

    <!-- KONTEN UTAMA DI DALAM BODY -->
    <div class="flex-grow flex flex-col p-4 sm:p-6 lg:p-8 justify-center items-center relative z-10">
        
        <main class="glass-panel w-full max-w-6xl rounded-3xl p-5 sm:p-8 lg:p-10 flex flex-col justify-between relative overflow-hidden app-transition animate-float-slow">
            
            <!-- HEADER JUDUL TENAGAH (Hero Banner Mysnack) -->
            <div class="text-center pb-6 sm:pb-8 border-b border-snack-sage/30 mb-8 relative">
                
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-snack-mint/60 border border-white text-snack-deep text-xs font-bold tracking-wide uppercase mb-3 shadow-xs">
                    <span class="w-2 h-2 rounded-full bg-snack-dark animate-ping"></span>
                    Smart Snack Tracker
                </div>

                <div class="flex items-center justify-center gap-3 mb-2">
                    <div class="w-10 h-10 rounded-2xl bg-white flex items-center justify-center text-snack-dark shadow-sm">
                        <!-- ICON ORIGINAL 6 -->
                        <svg class="w-6 h-6 text-snack-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                    </div>
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-snack-deep tracking-tight">Mysnack</h1>
                </div>

                <p class="text-xs sm:text-sm md:text-base text-snack-dark/80 max-w-md mx-auto font-medium">
                    Platform pencatatan jajan favoritmu. Pantau dan kelola pengeluaran harian dengan mudah.
                </p>
            </div>

            <!-- DASHBOARD RINGKASAN & QUICK STATS (Tambahan UX Dashboard Terbaik) -->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 sm:gap-4 mb-6">
                <div class="glass-card rounded-2xl p-4 border border-white flex flex-col justify-between">
                    <span class="text-[11px] font-bold text-snack-sage uppercase tracking-wider">Status Jajan</span>
                    <span class="text-base sm:text-lg font-extrabold text-snack-deep mt-1">Aktif & Terkendali</span>
                </div>
                <div class="glass-card rounded-2xl p-4 border border-white flex flex-col justify-between">
                    <span class="text-[11px] font-bold text-snack-sage uppercase tracking-wider">Mode Aplikasi</span>
                    <span class="text-base sm:text-lg font-extrabold text-snack-deep mt-1">Pencatatan Harian</span>
                </div>
                <div class="col-span-2 sm:col-span-1 glass-card rounded-2xl p-4 border border-white flex flex-col justify-between bg-gradient-to-r from-snack-mint/40 to-snack-teal/40">
                    <span class="text-[11px] font-bold text-snack-dark uppercase tracking-wider">Metode Hemat</span>
                    <span class="text-base sm:text-lg font-extrabold text-snack-deep mt-1">Otomatis Terorganisir</span>
                </div>
            </div>

            <!-- TMBOL MENU UTAMA CARD GRID (Interaktif & Fleksibel) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                
                <!-- Card 1: Beranda -->
                <a href="/" class="group p-5 rounded-2xl bg-snack-dark text-white flex flex-col justify-between border border-snack-deep/20 app-transition hover:-translate-y-2 snack-shadow-hover relative overflow-hidden">
                    <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center mb-4 group-hover:scale-110 app-transition">
                        <!-- ICON ORIGINAL 7 -->
                        <svg class="w-5 h-5 text-snack-mint" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold text-base mb-1 text-white group-hover:text-snack-mint app-transition">Beranda</div>
                        <span class="text-xs text-snack-teal/80 font-normal leading-relaxed">Halaman utama aplikasi anda</span>
                    </div>
                </a>

                <!-- Card 2: Daftar Jajan Saya -->
                <a href="/jajan" class="group p-5 rounded-2xl bg-white text-snack-deep flex flex-col justify-between border border-white/80 app-transition hover:-translate-y-2 snack-shadow-hover relative overflow-hidden">
                    <div class="w-10 h-10 rounded-xl bg-snack-mint/50 flex items-center justify-center mb-4 group-hover:scale-110 app-transition">
                        <!-- ICON ORIGINAL 8 -->
                        <svg class="w-5 h-5 text-snack-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-extrabold text-base mb-1 text-snack-deep group-hover:text-snack-sage app-transition">Daftar Jajan Saya</div>
                        <span class="text-xs text-snack-dark/70 font-medium leading-relaxed">Lihat dan tambah jajanan anda</span>
                    </div>
                </a>

                <!-- Card 3: Kategori Jajan -->
                <a href="/kategori" class="group p-5 rounded-2xl bg-gradient-to-br from-snack-sage to-[#6B9E9C] text-white flex flex-col justify-between border border-white/30 app-transition hover:-translate-y-2 snack-shadow-hover relative overflow-hidden">
                    <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center mb-4 group-hover:scale-110 app-transition">
                        <!-- ICON ORIGINAL 9 -->
                        <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2h-5l-2-2H6c-1.1 0-2 .9-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-bold text-base mb-1 text-white group-hover:text-snack-mint app-transition">Kategori Jajan</div>
                        <span class="text-xs text-white/80 font-normal leading-relaxed">Kelompokkan jenis jajan anda</span>
                    </div>
                </a>

                <!-- Card 4: Rekap Jajan -->
                <a href="/rekap" class="group p-5 rounded-2xl bg-white text-snack-deep flex flex-col justify-between border border-white/80 app-transition hover:-translate-y-2 snack-shadow-hover relative overflow-hidden">
                    <div class="w-10 h-10 rounded-xl bg-snack-teal/40 flex items-center justify-center mb-4 group-hover:scale-110 app-transition">
                        <!-- ICON ORIGINAL 10 -->
                        <svg class="w-5 h-5 text-snack-deep" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="font-extrabold text-base mb-1 text-snack-deep group-hover:text-snack-sage app-transition">Rekap Jajan</div>
                        <span class="text-xs text-snack-dark/70 font-medium leading-relaxed">Perbarui jajanan dan laporan</span>
                    </div>
                </a>

            </div>

            <!-- AREA KONTEN / YIELD BLADE -->
            <div class="w-full bg-white/75 backdrop-blur-md rounded-2xl p-6 sm:p-8 border border-white text-snack-deep flex flex-col items-center justify-center text-center min-h-[260px] shadow-sm">
                
                <div class="flex items-center justify-center gap-2 mb-3 px-4 py-1.5 rounded-full bg-snack-mint/40 border border-snack-sage/20">
                    <!-- ICON ORIGINAL 11 -->
                    <svg class="w-5 h-5 text-snack-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h2 class="text-sm font-extrabold text-snack-deep tracking-wider uppercase">INFORMASI UTAMA</h2>
                </div>

                <div class="w-full">
                    @yield('konten')
                </div>

            </div>

            <!-- FOOTER KECIL -->
            <div class="mt-8 pt-4 border-t border-snack-sage/30 text-center text-xs text-snack-dark/70 flex flex-col sm:flex-row justify-between items-center gap-2 font-medium">
                <span>&copy; 2026 Mysnack Application. Created By: Bahi</span>
                <span class="text-snack-sage font-semibold">Sistem Pengelolaan Jajan Harian</span>
            </div>

        </main>
    </div>

</body>
</html>