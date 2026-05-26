<!DOCTYPE html>
<html lang="id" x-data="portfolioApp" :class="{ 'dark': darkMode }" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio Premium - {{ $personalData['name'] ?? 'Ghanda Ramadhan Siregar' }}</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Tailwind Configuration & Custom Animations -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    animation: {
                        'marquee': 'marquee 25s linear infinite',
                        'spin-slow': 'spin 12s linear infinite',
                    },
                    keyframes: {
                        marquee: {
                            '0%': { transform: 'translateX(0%)' },
                            '100%': { transform: 'translateX(-50%)' }
                        }
                    }
                }
            }
        }
    </script>
    
    <style>
        [x-cloak] { display: none !important; }
        .animate-marquee {
            display: flex;
            width: max-content;
        }
    </style>

    <!-- Alpine.js Application Logic -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('portfolioApp', () => ({
                darkMode: false,
                loading: true,
                activeSection: 'home',
                activeTheme: 'cyber',
                copiedText: false,
                profileImage: null,
                formData: { name: '', email: '', message: '' },
                
                // Color Theme Definitions
                themeClasses: {
                    cyber: {
                        name: 'Cyber Neon',
                        gradient: 'from-pink-500 via-purple-500 to-cyan-500',
                        button: 'bg-gradient-to-r from-pink-500 via-purple-500 to-cyan-500',
                        cardAccent: 'from-pink-600 via-purple-600 to-indigo-600',
                        text: 'text-pink-500',
                        shadowBrutalist: 'shadow-[6px_6px_0px_rgba(236,72,153,1)]'
                    },
                    candy: {
                        name: 'Vibrant Candy',
                        gradient: 'from-amber-400 via-orange-500 to-rose-500',
                        button: 'bg-gradient-to-r from-amber-400 via-orange-500 to-rose-500',
                        cardAccent: 'from-orange-500 to-rose-600',
                        text: 'text-orange-500',
                        shadowBrutalist: 'shadow-[6px_6px_0px_rgba(245,158,11,1)]'
                    },
                    ocean: {
                        name: 'Emerald Sea',
                        gradient: 'from-emerald-400 via-teal-500 to-indigo-500',
                        button: 'bg-gradient-to-r from-emerald-400 via-teal-500 to-indigo-500',
                        cardAccent: 'from-emerald-600 to-teal-700',
                        text: 'text-emerald-500',
                        shadowBrutalist: 'shadow-[6px_6px_0px_rgba(16,185,129,1)]'
                    }
                },

                navLinks: [
                    { id: 'home', label: 'Beranda' },
                    { id: 'about', label: 'Tentang' },
                    { id: 'skills', label: 'Keahlian' },
                    { id: 'experience', label: 'Pengalaman' },
                    { id: 'contact', label: 'Kontak' }
                ],

                educations: [
                    { level: "Perguruan Tinggi", school: "Universitas Malikussaleh", status: "Mahasiswa Aktif", year: "Saat Ini", color: "from-violet-500 to-indigo-500", shadow: "shadow-[6px_6px_0px_rgba(99,102,241,1)]" },
                    { level: "SMA", school: "MAN 2 Deli Serdang", status: "Lulus", year: "2024", color: "from-pink-500 to-rose-500", shadow: "shadow-[6px_6px_0px_rgba(244,63,94,1)]" },
                    { level: "SMP", school: "MTsS Yapni", status: "Lulus", year: "2021", color: "from-amber-500 to-orange-500", shadow: "shadow-[6px_6px_0px_rgba(245,158,11,1)]" },
                    { level: "SD", school: "SD Negeri 107982", status: "Lulus", year: "2018", color: "from-teal-500 to-emerald-500", shadow: "shadow-[6px_6px_0px_rgba(20,184,166,1)]" }
                ],

                skills: [
                    { name: "Komunikasi Publik", category: "Interpersonal", level: "90%", color: "from-pink-500 to-rose-500" },
                    { name: "Pelayanan Pelanggan (Customer Service)", category: "Business", level: "95%", color: "from-amber-500 to-orange-500" },
                    { name: "Kerja Sama Tim (Teamwork)", category: "Interpersonal", level: "92%", color: "from-indigo-500 to-blue-500" },
                    { name: "Disiplin & Tanggung Jawab", category: "Karakter", level: "98%", color: "from-violet-500 to-purple-500" },
                    { name: "Cepat Belajar Hal Baru", category: "Karakter", level: "95%", color: "from-fuchsia-500 to-pink-500" },
                    { name: "Dasar Pengelolaan Toko & Ritel", category: "Business", level: "88%", color: "from-emerald-500 to-teal-500" },
                    { name: "Microsoft Word", category: "Technical", level: "85%", color: "from-cyan-500 to-blue-500" },
                    { name: "Microsoft PowerPoint", category: "Technical", level: "85%", color: "from-rose-500 to-red-500" }
                ],

                experiences: [
                    {
                        role: "Membantu Usaha Keluarga",
                        company: "Toko Rizghan",
                        period: "Aktif Melatih Soft-skill & Bisnis",
                        color: "from-emerald-400 via-teal-500 to-cyan-500",
                        shadow: "shadow-[10px_10px_0px_rgba(16,185,129,1)]",
                        description: "Membantu mengelola operasional harian usaha ritel keluarga, berinteraksi langsung dengan pelanggan, serta mempraktikkan manajemen stok secara berkala.",
                        details: [
                            "Melayani pelanggan dengan baik, ramah, dan profesional.",
                            "Membantu memproses transaksi penjualan tunai maupun non-tunai.",
                            "Menata, mengelompokkan, dan mengecek ketersediaan stok barang.",
                            "Menjaga kebersihan, kerapian, dan estetika display toko.",
                            "Belajar memahami psikologi serta kebutuhan pelanggan secara real-time."
                        ]
                    },
                    {
                        role: "Aktivitas Akademik & Organisasi",
                        company: "Universitas Malikussaleh",
                        period: "Mahasiswa Aktif",
                        color: "from-indigo-500 via-purple-500 to-pink-500",
                        shadow: "shadow-[10px_10px_0px_rgba(139,92,246,1)]",
                        description: "Berpartisipasi aktif dalam berbagai kegiatan kampus untuk melatih kepemimpinan dan kerja sama tim.",
                        details: [
                            "Mengikuti berbagai kegiatan kemahasiswaan positif.",
                            "Berpartisipasi aktif dalam kerja sama tim dalam proyek kelas.",
                            "Aktif dalam sesi diskusi interaktif serta kegiatan kelas lainnya.",
                            "Membantu menyukseskan kegiatan kampus apabila dibutuhkan."
                        ]
                    }
                ],

                init() {
                    setTimeout(() => {
                        this.loading = false;
                        // Inisialisasi ikon Lucide secara aman
                        lucide.createIcons();
                    }, 1200);
                },

                triggerFileInput() {
                    document.getElementById('fileInput').click();
                },

                handleImageUpload(e) {
                    const file = e.target.files[0];
                    if (file) {
                        this.profileImage = URL.createObjectURL(file);
                    }
                },

                copyToClipboard(text) {
                    const el = document.createElement('textarea');
                    el.value = text;
                    document.body.appendChild(el);
                    el.select();
                    document.execCommand('copy');
                    document.body.removeChild(el);
                    this.copiedText = true;
                    setTimeout(() => this.copiedText = false, 2000);
                },

                submitForm() {
                    alert('Pesan berhasil terkirim secara simulasi! (Ghanda akan segera merespon)');
                    this.formData = { name: '', email: '', message: '' };
                }
            }));
        });
    </script>

    <!-- Alpine.js CDN (Dipanggil SETELAH script logic didefinisikan agar tidak ada delay inisialisasi) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="transition-colors duration-500 font-sans selection:bg-pink-500 selection:text-white relative overflow-x-hidden"
      :class="darkMode ? 'bg-slate-950 text-slate-100' : 'bg-white text-slate-900'">

    <!-- Dotted Grid Overlay (Hanya Mode Terang) -->
    <div x-show="!darkMode" class="absolute inset-0 pointer-events-none opacity-[0.35] z-0" 
         style="background-image: radial-gradient(#cbd5e1 1.5px, transparent 1.5px); background-size: 24px 24px;">
    </div>

    <!-- PRELOADER -->
    <div x-show="loading" 
         x-transition:leave="transition ease-in duration-500 transform opacity-0"
         class="fixed inset-0 bg-slate-950 z-50 flex flex-col items-center justify-center">
        <div class="relative flex flex-col items-center">
            <div class="w-16 h-16 rounded-full p-[3px] animate-spin flex items-center justify-center bg-gradient-to-tr"
                 :class="themeClasses[activeTheme].gradient">
                <div class="w-full h-full bg-slate-950 rounded-full"></div>
            </div>
            <div class="mt-8 text-center">
                <span class="text-xs uppercase tracking-[0.4em] text-slate-400 font-extrabold">LARAVEL PORTFOLIO</span>
                <h2 class="text-2xl font-bold text-white mt-1 font-serif tracking-widest">Ghanda Ramadhan S.</h2>
            </div>
        </div>
    </div>

    <!-- STICKY NAVBAR -->
    <nav class="fixed top-0 left-0 w-full z-40 backdrop-blur-md transition-all duration-300 border-b"
         :class="darkMode ? 'bg-slate-950/80 border-slate-900' : 'bg-white/90 border-slate-200'">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            
            <!-- Brand Logo -->
            <a href="#home" class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl p-[2px] shadow-lg" :class="'bg-gradient-to-tr ' + themeClasses[activeTheme].gradient">
                    <div class="w-full h-full bg-slate-950 rounded-[10px] flex items-center justify-center text-white font-extrabold text-lg">
                        G
                    </div>
                </div>
                <div class="flex flex-col">
                    <span class="font-extrabold tracking-tight text-sm md:text-base bg-clip-text text-transparent bg-gradient-to-r"
                          :class="themeClasses[activeTheme].gradient">
                        Ghanda R. S.
                    </span>
                    <span class="text-[10px] uppercase tracking-wider text-slate-400 font-extrabold">Mahasiswa & Ritel</span>
                </div>
            </a>

            <!-- Nav Links (Desktop) -->
            <div class="hidden md:flex items-center space-x-1">
                <template x-for="link in navLinks" :key="link.id">
                    <a :href="'#' + link.id"
                       @click="activeSection = link.id"
                       class="px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider transition-all duration-200"
                       :class="activeSection === link.id ? 'text-white ' + themeClasses[activeTheme].button : 'text-slate-500 hover:text-slate-900 dark:hover:text-white'"
                       x-text="link.label">
                    </a>
                </template>
            </div>

            <!-- Theme Switcher & Dark Mode Actions -->
            <div class="flex items-center space-x-3 z-50">
                
                <!-- THEME PALETTE DROP_DOWN (Dynamic Color Changer) -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            class="flex items-center space-x-1.5 px-3 py-1.5 rounded-lg border text-xs font-bold uppercase tracking-wide transition-all"
                            :class="darkMode ? 'border-slate-800 bg-slate-900/50 hover:bg-slate-800' : 'border-slate-300 bg-slate-100 hover:bg-slate-200'">
                        <span class="w-2.5 h-2.5 rounded-full bg-gradient-to-tr" :class="themeClasses[activeTheme].gradient"></span>
                        <span class="hidden sm:inline" x-text="themeClasses[activeTheme].name"></span>
                    </button>
                    
                    <div x-show="open" @click.away="open = false" x-cloak
                         class="absolute right-0 mt-2 w-48 rounded-xl border p-2 shadow-xl z-50 backdrop-blur-lg"
                         :class="darkMode ? 'bg-slate-900/95 border-slate-800' : 'bg-white/95 border-slate-200'">
                        <p class="text-[9px] uppercase tracking-wider text-slate-400 font-extrabold px-2.5 py-1.5">Pilih Tema Warna</p>
                        <template x-for="(theme, key) in themeClasses" :key="key">
                            <button @click="activeTheme = key; open = false"
                                    class="w-full flex items-center space-x-2.5 px-2.5 py-2 rounded-lg text-xs font-bold transition-all hover:bg-slate-500/10 text-left">
                                <span class="w-3 h-3 rounded-full bg-gradient-to-tr" :class="theme.gradient"></span>
                                <span class="text-slate-800 dark:text-slate-200" x-text="theme.name"></span>
                            </button>
                        </template>
                    </div>
                </div>

                <!-- Dark Mode Toggle -->
                <button @click="darkMode = !darkMode"
                        class="p-2.5 rounded-xl border transition-all duration-300"
                        :class="darkMode ? 'border-slate-800 bg-slate-900/50 hover:bg-slate-850 text-amber-400' : 'border-slate-200 bg-slate-100 hover:bg-slate-200 text-slate-800'">
                    <i :data-lucide="darkMode ? 'sun' : 'moon'" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- FLOATING QURAN CARD WIDGET -->
    <div class="fixed bottom-6 right-6 z-30 max-w-xs animate-bounce hover:animate-none">
        <div class="border text-white p-4 rounded-2xl shadow-2xl flex items-start space-x-3"
             :class="'bg-gradient-to-r ' + themeClasses[activeTheme].cardAccent + ' ' + (darkMode ? 'border-white/10' : 'border-black/10')">
            <div class="p-2 bg-white/20 rounded-lg shrink-0 mt-0.5">
                <i data-lucide="book-open-check" class="w-5 h-5"></i>
            </div>
            <div>
                <span class="text-[10px] text-white/80 uppercase font-bold tracking-wider">Kualitas Karakter</span>
                <h4 class="text-xs font-extrabold leading-tight mt-0.5">Hafalan Al-Qur'an Juz 1</h4>
                <p class="text-[10px] text-white/90 mt-1 line-clamp-2 leading-relaxed">Membentuk kedisiplinan, kejujuran, dan rasa tanggung jawab dalam bekerja harian.</p>
            </div>
        </div>
    </div>

    <!-- 1. HERO SECTION -->
    <section id="home" class="relative pt-36 pb-24 md:py-40 flex items-center overflow-hidden min-h-[95vh] z-10">
        <!-- Floating Ambient Glow blobs -->
        <div class="absolute top-10 left-10 w-[350px] h-[350px] rounded-full blur-[120px] pointer-events-none opacity-20"
             :class="'bg-gradient-to-tr ' + themeClasses[activeTheme].gradient"></div>
        <div class="absolute bottom-10 right-10 w-[350px] h-[350px] rounded-full blur-[120px] pointer-events-none opacity-20"
             :class="'bg-gradient-to-tr ' + themeClasses[activeTheme].gradient"></div>

        <div class="max-w-7xl mx-auto px-6 w-full relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Hero Content -->
                <div class="lg:col-span-7 flex flex-col space-y-6 text-left">
                    <div class="inline-flex items-center space-x-2 px-4 py-2 rounded-full border text-xs font-extrabold uppercase tracking-widest w-fit shadow-sm"
                         :class="darkMode ? 'bg-slate-900/80 border-slate-800' : 'bg-white border-slate-200'">
                        <i data-lucide="sparkles" class="w-3.5 h-3.5 animate-spin text-pink-500"></i>
                        <span>Mahasiswa Unimal & Toko Rizghan</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl md:text-6xl font-black tracking-tight leading-tight">
                        Membangun <span class="text-transparent bg-clip-text bg-gradient-to-r" :class="themeClasses[activeTheme].gradient">Integritas</span> & Melayani Sepenuh Hati
                    </h1>

                    <p class="text-base sm:text-lg leading-relaxed max-w-2xl font-medium"
                       :class="darkMode ? 'text-slate-300' : 'text-slate-600'">
                        Halo! Saya <strong class="font-black">{{ $personalData['name'] ?? 'Ghanda Ramadhan Siregar' }}</strong>, seorang mahasiswa berdedikasi tinggi di Universitas Malikussaleh yang memegang erat kedisiplinan, kejujuran harian, serta aktif membantu usaha keluarga di Toko Rizghan.
                    </p>

                    <!-- Badges with Brutalist Shadows -->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 pt-2">
                        <div class="p-4 rounded-2xl border-2 transition-all duration-300 hover:-translate-y-1 bg-white dark:bg-slate-900 border-black"
                             :class="themeClasses[activeTheme].shadowBrutalist">
                            <span class="text-[10px] uppercase tracking-wider text-slate-500 font-extrabold">Usaha Ritel</span>
                            <span class="font-extrabold text-sm mt-1 block">Toko Rizghan</span>
                        </div>
                        <div class="p-4 rounded-2xl border-2 transition-all duration-300 hover:-translate-y-1 bg-white dark:bg-slate-900 border-black"
                             :class="themeClasses[activeTheme].shadowBrutalist">
                            <span class="text-[10px] uppercase tracking-wider text-slate-500 font-extrabold">Pendidikan</span>
                            <span class="font-extrabold text-sm mt-1 block">Univ. Malikussaleh</span>
                        </div>
                        <div class="p-4 rounded-2xl border-2 transition-all duration-300 hover:-translate-y-1 bg-white dark:bg-slate-900 border-black col-span-2 md:col-span-1"
                             :class="themeClasses[activeTheme].shadowBrutalist">
                            <span class="text-[10px] uppercase tracking-wider text-slate-500 font-extrabold">Kredensial</span>
                            <span class="font-extrabold text-sm mt-1 block">Hafalan Juz 1</span>
                        </div>
                    </div>

                    <!-- CTA Actions -->
                    <div class="flex flex-wrap gap-4 pt-4">
                        <a href="#contact"
                           class="px-6 py-3.5 rounded-xl text-white font-extrabold text-sm tracking-wider uppercase transition-all duration-300 flex items-center space-x-2 shadow-lg"
                           :class="themeClasses[activeTheme].button">
                            <span>Hubungi Saya</span>
                            <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                        </a>
                        <a href="#about"
                           class="px-6 py-3.5 rounded-xl border-2 transition-all duration-300 flex items-center space-x-2 font-bold text-sm uppercase tracking-wider"
                           :class="darkMode ? 'border-slate-850 hover:border-slate-700 bg-slate-900/20 text-slate-300' : 'border-black hover:bg-slate-100 bg-white text-slate-900 shadow-[4px_4px_0px_rgba(0,0,0,1)]'">
                            <span>Mengenal Ghanda</span>
                            <i data-lucide="chevron-right" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Photo Container (Bisa Unggah Interaktif) -->
                <div class="lg:col-span-5 relative flex items-center justify-center">
                    <div class="relative w-80 h-96 sm:w-96 sm:h-[450px]">
                        
                        <!-- Glowing card backdrops -->
                        <div class="absolute inset-0 rounded-3xl rotate-6 opacity-30 blur-sm animate-pulse bg-gradient-to-tr" :class="themeClasses[activeTheme].gradient"></div>
                        <div class="absolute inset-0 rounded-3xl -rotate-3 opacity-20 bg-slate-900"></div>

                        <!-- Main Frame -->
                        <div class="absolute inset-0 rounded-3xl border-2 p-4 flex flex-col justify-between overflow-hidden group"
                             :class="darkMode ? 'bg-slate-950 border-white/10' : 'bg-white border-black shadow-[12px_12px_0px_rgba(0,0,0,1)]'">
                            
                            <!-- Image Canvas -->
                            <div class="relative w-full h-[78%] rounded-2xl overflow-hidden bg-slate-900 border border-slate-800">
                                <template x-if="profileImage">
                                    <img :src="profileImage" alt="Foto Ghanda" class="w-full h-full object-cover">
                                </template>
                                <template x-if="!profileImage">
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-slate-950 text-slate-400 p-6 text-center">
                                        <div class="w-16 h-16 mb-4 rounded-full p-[2px] animate-bounce" :class="'bg-gradient-to-tr ' + themeClasses[activeTheme].gradient">
                                            <div class="w-full h-full bg-slate-950 rounded-full flex items-center justify-center text-white">
                                                <i data-lucide="camera" class="w-6 h-6"></i>
                                            </div>
                                        </div>
                                        <span class="text-xs font-black text-white">Belum Ada Foto Profil</span>
                                        <p class="text-[10px] text-slate-500 mt-2">Klik tombol di bawah atau arahkan kursor untuk unggah foto asli Anda!</p>
                                    </div>
                                </template>

                                <!-- Hover Action Layer -->
                                <div @click="triggerFileInput()"
                                     class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center cursor-pointer text-white space-y-1">
                                    <i data-lucide="upload" class="w-8 h-8 text-white"></i>
                                    <span class="text-xs font-extrabold uppercase">Unggah Foto</span>
                                </div>

                                <!-- Floating Controls -->
                                <div class="absolute top-3 right-3 flex space-x-1.5 z-20">
                                    <button @click.stop="triggerFileInput()" class="p-1.5 bg-slate-950/80 hover:bg-slate-850 rounded-md border border-white/10 text-white">
                                        <i data-lucide="upload" class="w-3.5 h-3.5"></i>
                                    </button>
                                    <button x-show="profileImage" @click.stop="profileImage = null" class="p-1.5 bg-slate-950/80 hover:bg-rose-600 rounded-md border border-white/10 text-white">
                                        <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Footer Card Identity -->
                            <div class="h-[18%] flex flex-col justify-center border-t border-slate-800/10 dark:border-slate-800 pt-2">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h3 class="font-black text-sm text-slate-900 dark:text-white leading-none">Ghanda Ramadhan S.</h3>
                                        <p class="text-[10px] text-slate-500 mt-1.5">Lahir di Lubuk Pakam, 2006</p>
                                    </div>
                                    <span class="text-[10px] uppercase font-extrabold text-transparent bg-clip-text bg-gradient-to-r" :class="themeClasses[activeTheme].gradient">Unimal Aktif</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- HIDDEN FILE INPUT -->
    <input type="file" id="fileInput" @change="handleImageUpload" accept="image/*" class="hidden">

    <!-- INFINITE TEXT RUNNING MARQUEE -->
    <div class="w-full py-5 border-y-2 border-black shadow-lg relative z-20" :class="'bg-gradient-to-r ' + themeClasses[activeTheme].cardAccent">
        <div class="flex whitespace-nowrap animate-marquee">
            <div class="flex space-x-12 text-xs uppercase tracking-[0.3em] font-black text-white">
                <span>📚 Mahasiswa Universitas Malikussaleh</span>
                <span>✨ Toko Rizghan</span>
                <span>📖 Hafalan Al-Qur'an Juz 1</span>
                <span>🤝 Kerja Sama Tim</span>
                <span>🚀 Cepat Belajar hal baru</span>
                <span>📍 Lubuk Pakam</span>
                <span>🌟 Integritas & Disiplin harian</span>
            </div>
            <div class="flex space-x-12 text-xs uppercase tracking-[0.3em] font-black text-white ml-12">
                <span>📚 Mahasiswa Universitas Malikussaleh</span>
                <span>✨ Toko Rizghan</span>
                <span>📖 Hafalan Al-Qur'an Juz 1</span>
                <span>🤝 Kerja Sama Tim</span>
                <span>🚀 Cepat Belajar hal baru</span>
                <span>📍 Lubuk Pakam</span>
                <span>🌟 Integritas & Disiplin harian</span>
            </div>
        </div>
    </div>

    <!-- 2. ABOUT ME SECTION -->
    <section id="about" class="py-24 relative overflow-hidden z-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-xs uppercase tracking-[0.25em] font-black mb-3" :class="themeClasses[activeTheme].text">TENTANG SAYA</h2>
                <h3 class="text-3xl md:text-4xl font-black tracking-tight">Karakter Unggul & Integritas Nyata</h3>
                <div class="w-20 h-1.5 mx-auto mt-4 rounded-full bg-gradient-to-r" :class="themeClasses[activeTheme].gradient"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                <!-- Detailed Bio -->
                <div class="lg:col-span-7 space-y-6">
                    <div class="flex flex-col sm:flex-row sm:items-center gap-4 p-5 rounded-2xl border-2 shadow-md bg-white dark:bg-slate-900 border-black">
                        <div @click="triggerFileInput()" class="w-16 h-16 rounded-xl bg-slate-900 border-2 border-slate-800 overflow-hidden shrink-0 cursor-pointer flex items-center justify-center relative">
                            <template x-if="profileImage">
                                <img :src="profileImage" alt="Ghanda R." class="w-full h-full object-cover">
                            </template>
                            <template x-if="!profileImage">
                                <i data-lucide="camera" class="w-6 h-6 text-slate-400"></i>
                            </template>
                        </div>
                        <div>
                            <h4 class="text-sm font-black font-serif">"Disiplin, jujur, dan bertanggung jawab dalam kehidupan sehari-hari."</h4>
                            <p class="text-[11px] text-slate-500 mt-1">Hafalan Al-Qur'an Juz 1 memandu kualitas karakter dalam segala aspek aktivitas.</p>
                        </div>
                    </div>

                    <p class="text-base leading-relaxed font-medium" :class="darkMode ? 'text-slate-300' : 'text-slate-600'">
                        {{ $personalData['about'] ?? 'Saya adalah mahasiswa aktif di Universitas Malikussaleh yang memiliki semangat belajar tinggi, disiplin, dan bertanggung jawab. Saya terbiasa bekerja sama dengan orang lain baik dalam lingkungan kampus maupun lingkungan kerja. Selain fokus pada pendidikan, saya juga aktif membantu usaha orang tua di Toko Rizghan.' }}
                    </p>

                    <!-- Identity Table -->
                    <div class="p-6 rounded-2xl border-2 bg-white dark:bg-slate-900 border-black" :class="themeClasses[activeTheme].shadowBrutalist">
                        <h5 class="font-black text-xs uppercase tracking-widest mb-4">Identitas Diri Resmi</h5>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm font-semibold">
                            <div>
                                <span class="text-slate-500 block text-xs uppercase font-bold">Nama Lengkap</span>
                                <span class="font-extrabold text-slate-800 dark:text-slate-200">Ghanda Ramadhan Siregar</span>
                            </div>
                            <div>
                                <span class="text-slate-500 block text-xs uppercase font-bold">Tempat, Tanggal Lahir</span>
                                <span class="font-extrabold text-slate-800 dark:text-slate-200">Lubuk Pakam, 05 Oktober 2006</span>
                            </div>
                            <div class="md:col-span-2">
                                <span class="text-slate-500 block text-xs uppercase font-bold">Alamat</span>
                                <span class="font-extrabold text-slate-800 dark:text-slate-200">Kel. Paluh Kemiri, Kec. Lubuk Pakam, Deli Serdang, Sumatera Utara</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Academic Timeline -->
                <div class="lg:col-span-5 space-y-6">
                    <h4 class="text-lg font-black uppercase tracking-wider flex items-center space-x-2">
                        <i data-lucide="graduation-cap" class="text-slate-400"></i>
                        <span>Riwayat Pendidikan</span>
                    </h4>

                    <div class="space-y-6 relative before:absolute before:left-3 before:top-2 before:bottom-2 before:w-[3px]"
                         :style="'border-image: linear-gradient(to bottom, ' + (activeTheme === 'cyber' ? '#ec4899, #8b5cf6' : '#6366f1, #14b8a6') + ') 1;'">
                        <template x-for="edu in educations" :key="edu.level">
                            <div class="relative pl-8 group">
                                <div class="absolute left-[7px] top-[6px] -translate-x-1/2 w-4 h-4 rounded-full bg-slate-950 border-2 border-pink-500 z-10"></div>
                                <div class="p-5 rounded-2xl border-2 transition-all duration-300 bg-white dark:bg-slate-900 border-black" :class="edu.shadow">
                                    <div class="flex items-center justify-between mb-1.5">
                                        <span class="text-[10px] font-black uppercase tracking-widest" :class="'text-transparent bg-clip-text bg-gradient-to-r ' + edu.color" x-text="edu.level"></span>
                                        <span class="text-[10px] px-2 py-0.5 rounded-md font-black text-white bg-gradient-to-r" :class="edu.color" x-text="edu.status"></span>
                                    </div>
                                    <h5 class="font-black text-sm text-slate-900 dark:text-white" x-text="edu.school"></h5>
                                    <span class="text-xs text-slate-500 font-bold" x-text="edu.year"></span>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 3. SKILLS SECTION -->
    <section id="skills" class="py-24 border-y-2 border-black bg-slate-50 dark:bg-slate-900/40 relative z-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-xs uppercase tracking-[0.25em] font-black mb-3" :class="themeClasses[activeTheme].text">KEAHLIAN & LAYANAN</h2>
                <h3 class="text-3xl md:text-4xl font-black tracking-tight">Kekuatan Kerja & Keterampilan</h3>
                <div class="w-16 h-1.5 mx-auto mt-4 rounded-full bg-gradient-to-r" :class="themeClasses[activeTheme].gradient"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <template x-for="skill in skills" :key="skill.name">
                    <div class="p-6 rounded-2xl border-2 bg-white dark:bg-slate-900 border-black" :class="themeClasses[activeTheme].shadowBrutalist">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-[10px] uppercase font-black tracking-widest text-pink-600" x-text="skill.category"></span>
                            <span class="text-xs font-black" x-text="skill.level"></span>
                        </div>
                        <h4 class="font-black text-sm leading-snug mb-4" x-text="skill.name"></h4>
                        <div class="w-full bg-slate-200 dark:bg-slate-800 h-2 rounded-full overflow-hidden">
                            <div class="h-full rounded-full bg-gradient-to-r" :class="skill.color" :style="'width: ' + skill.level"></div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- 4. EXPERIENCE SECTION -->
    <section id="experience" class="py-24 relative z-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-xs uppercase tracking-[0.25em] font-black mb-3" :class="themeClasses[activeTheme].text">PENGALAMAN & AKTIVITAS</h2>
                <h3 class="text-3xl md:text-4xl font-black tracking-tight">Keterlibatan & Pengalaman Kerja Riil</h3>
                <div class="w-16 h-1.5 mx-auto mt-4 rounded-full bg-gradient-to-r" :class="themeClasses[activeTheme].gradient"></div>
            </div>

            <div class="space-y-12">
                <template x-for="exp in experiences" :key="exp.role">
                    <div class="p-8 rounded-3xl border-2 relative overflow-hidden bg-white dark:bg-slate-900 border-black" :class="exp.shadow">
                        <div class="absolute top-0 left-0 w-full h-[4px] bg-gradient-to-r" :class="exp.color"></div>
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6 border-b pb-6 dark:border-slate-800">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 rounded-xl text-white flex items-center justify-center font-bold bg-slate-950">
                                    <i data-lucide="store" class="w-6 h-6"></i>
                                </div>
                                <div>
                                    <h4 class="text-xl font-black" x-text="exp.role"></h4>
                                    <span class="text-sm font-extrabold text-slate-500" x-text="exp.company"></span>
                                </div>
                            </div>
                            <span class="inline-block px-3 py-1.5 rounded-xl text-xs font-black text-white bg-gradient-to-r" :class="exp.color" x-text="exp.period"></span>
                        </div>
                        <p class="text-sm text-slate-600 dark:text-slate-350 leading-relaxed mb-4" x-text="exp.description"></p>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                            <template x-for="detail in exp.details" :key="detail">
                                <div class="flex items-start space-x-2">
                                    <i data-lucide="check-circle-2" class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5"></i>
                                    <span class="text-xs font-semibold" x-text="detail"></span>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <!-- 5. CONTACT SECTION -->
    <section id="contact" class="py-24 relative overflow-hidden z-10 border-t-2 border-black bg-slate-50 dark:bg-slate-900/20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-xs uppercase tracking-[0.25em] font-black mb-3" :class="themeClasses[activeTheme].text">HUBUNGI SAYA</h2>
                <h3 class="text-3xl md:text-4xl font-black tracking-tight">Koneksi & Kolaborasi Masa Depan</h3>
                <div class="w-16 h-1.5 mx-auto mt-4 rounded-full bg-gradient-to-r" :class="themeClasses[activeTheme].gradient"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-stretch">
                <!-- Left Details -->
                <div class="lg:col-span-5 flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <h4 class="text-xl font-black">Informasi Kontak Utama</h4>
                        <p class="text-xs text-slate-500 leading-relaxed font-semibold">
                          Silakan hubungi saya melalui jalur resmi di bawah ini atau tinggalkan pesan langsung.
                        </p>
                        
                        <div class="space-y-4">
                            <a href="tel:+6285891437031" class="flex items-center space-x-4 p-4 rounded-2xl border-2 bg-white dark:bg-slate-900 border-black hover:bg-slate-50 dark:hover:bg-slate-800">
                                <div class="p-3 bg-emerald-100 dark:bg-emerald-950/40 text-emerald-600 rounded-xl">
                                    <i data-lucide="phone" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <span class="text-[10px] text-slate-500 block uppercase font-black">Telepon / WhatsApp</span>
                                    <span class="text-sm font-black">+62 858-9143-7031</span>
                                </div>
                            </a>
                            <div @click="copyToClipboard('ghandaramadhan70@gmail.com')" class="flex items-center justify-between p-4 rounded-2xl border-2 bg-white dark:bg-slate-900 border-black cursor-pointer hover:bg-slate-50 dark:hover:bg-slate-800">
                                <div class="flex items-center space-x-4">
                                    <div class="p-3 bg-pink-100 dark:bg-pink-950/40 text-pink-600 rounded-xl">
                                        <i data-lucide="mail" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <span class="text-[10px] text-slate-500 block uppercase font-black">Alamat Email</span>
                                        <span class="text-sm font-black">ghandaramadhan70@gmail.com</span>
                                    </div>
                                </div>
                                <span class="text-xs font-black text-pink-500" x-text="copiedText ? 'Disalin!' : 'Salin'"></span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="https://wa.me/6285891437031" target="_blank"
                       class="w-full py-4 px-6 rounded-xl font-black text-sm text-center text-white bg-gradient-to-r from-emerald-500 to-teal-600 shadow-lg">
                        Hubungi via WhatsApp
                    </a>
                </div>

                <!-- Right Form & Map -->
                <div class="lg:col-span-7 flex flex-col space-y-6">
                    <div class="p-6 rounded-3xl border-2 bg-white dark:bg-slate-900 border-black shadow-[8px_8px_0px_rgba(0,0,0,1)]">
                        <h4 class="font-black text-base mb-4">Kirim Pesan Langsung</h4>
                        <form @submit.prevent="submitForm()" class="space-y-4">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[9px] uppercase text-slate-500 font-black mb-1.5">Nama Lengkap</label>
                                    <input type="text" required x-model="formData.name" class="w-full p-3.5 text-xs font-bold rounded-xl border-2 border-black outline-none bg-slate-50 dark:bg-slate-950" placeholder="Nama Anda">
                                </div>
                                <div>
                                    <label class="block text-[9px] uppercase text-slate-500 font-black mb-1.5">Email Anda</label>
                                    <input type="email" required x-model="formData.email" class="w-full p-3.5 text-xs font-bold rounded-xl border-2 border-black outline-none bg-slate-50 dark:bg-slate-950" placeholder="email@domain.com">
                                </div>
                            </div>
                            <div>
                                <label class="block text-[9px] uppercase text-slate-500 font-black mb-1.5">Isi Pesan</label>
                                <textarea rows="3" required x-model="formData.message" class="w-full p-3.5 text-xs font-bold rounded-xl border-2 border-black outline-none bg-slate-50 dark:bg-slate-950" placeholder="Tulis pesan Anda disini..."></textarea>
                            </div>
                            <button type="submit" class="w-full py-3.5 text-white font-black rounded-xl text-xs tracking-wider uppercase" :class="themeClasses[activeTheme].button">
                                Kirim Email
                            </button>
                        </form>
                    </div>

                    <!-- Map -->
                    <div class="rounded-2xl overflow-hidden h-48 border-2 border-black relative shadow-inner">
                        <iframe title="Lubuk Pakam Map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15931.399650047464!2d98.86877995180631!3d3.5528825854611484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303144a6b29f074d%3A0x6b107e38f9064c67!2sLubuk%20Pakam%2C%20Kec.%20Lubuk%20Pakam%2C%20Kabupaten%20Deli%20Serdang%2C%20Sumatera%20Utara!5e0!3m2!1sid!2sid!4v1716760000000!5m2!1sid!2sid" width="100%" height="100%" style="border: 0;" allowfullscreen="" loading="lazy" class="grayscale dark:opacity-85 dark:invert"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="py-12 border-t-2 border-black" :class="darkMode ? 'bg-slate-950 text-slate-400' : 'bg-slate-100 text-slate-700'">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <p class="text-xs font-bold">Portofolio Personal & CV Terverifikasi © 2026 Ghanda Ramadhan Siregar. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>