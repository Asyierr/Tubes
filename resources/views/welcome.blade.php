<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>BoxBuddy</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-fade-up {
            animation: fadeUp 0.8s ease-out forwards;
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }
    </style>
</head>

<body class="min-h-screen bg-gradient-to-br from-[#0f172a] via-[#020617] to-black text-white overflow-hidden">

    <!-- Top Navigation -->
    <header class="fixed top-0 left-0 w-full flex justify-between items-center px-8 py-6 z-20">
        <div class="flex items-center gap-3">
            <img src="{{ asset('images/boxbuddylogofix-removebg-preview.png') }}" class="h-10" alt="BoxBuddy">
            <span class="font-bold text-lg">BoxBuddy</span>
        </div>

        <div class="flex gap-4">
            <a href="{{ route('login') }}"
               class="px-5 py-2 rounded-lg border border-white/20 hover:bg-white/10 transition">
                Login
            </a>
            <a href="{{ route('register') }}"
               class="px-5 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 transition font-semibold">
                Register
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="relative flex flex-col items-center justify-center min-h-screen px-6 text-center">

        <!-- Glow Background -->
        <div class="absolute w-[500px] h-[500px] bg-blue-600/20 blur-3xl rounded-full top-1/3 -z-10"></div>

        <img
            src="{{ asset('images/boxbuddylogofix-removebg-preview.png') }}"
            alt="BoxBuddy Logo"
            class="h-32 mb-8 animate-float"
        >

        <h1 class="text-5xl md:text-6xl font-bold opacity-0 animate-fade-up" style="animation-delay: 0.2s">
            Kirim & Pindahan Jadi Simpel
        </h1>

        <p class="text-gray-300 text-lg md:text-xl mt-6 max-w-2xl opacity-0 animate-fade-up" style="animation-delay: 0.4s">
            BoxBuddy adalah platform pengiriman dan pindahan barang khusus mahasiswa yang
            aman, fleksibel, dan bisa kamu atur sesuai kebutuhan.
        </p>

        <div class="flex gap-4 mt-10 opacity-0 animate-fade-up" style="animation-delay: 0.6s">
            <a href="{{ route('register') }}"
               class="px-10 py-4 rounded-xl font-semibold bg-blue-600 hover:bg-blue-700 transition shadow-lg shadow-blue-600/30">
                Mulai Sekarang
            </a>
            <a href="#"
               class="px-10 py-4 rounded-xl font-semibold border border-white/20 hover:bg-white/10 transition">
                Pelajari Lebih Lanjut
            </a>
        </div>

        <!-- Feature Cards -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-24 max-w-5xl opacity-0 animate-fade-up" style="animation-delay: 0.8s">
            <div class="p-6 rounded-2xl bg-white/5 backdrop-blur border border-white/10">
                <h3 class="font-semibold text-xl mb-2">Aman</h3>
                <p class="text-gray-400 text-sm">Barang kamu ditangani dengan sistem tracking dan partner terpercaya.</p>
            </div>
            <div class="p-6 rounded-2xl bg-white/5 backdrop-blur border border-white/10">
                <h3 class="font-semibold text-xl mb-2">Fleksibel</h3>
                <p class="text-gray-400 text-sm">Atur jadwal, ukuran, dan lokasi sesuai kebutuhan mahasiswa.</p>
            </div>
            <div class="p-6 rounded-2xl bg-white/5 backdrop-blur border border-white/10">
                <h3 class="font-semibold text-xl mb-2">Terpercaya</h3>
                <p class="text-gray-400 text-sm">Transparan harga, jelas proses, tanpa ribet.</p>
            </div>
        </section>

        <footer class="mt-24 text-sm text-gray-500">
            © {{ date('Y') }} BoxBuddy. Built with ❤️ for students.
        </footer>

    </main>

</body>
</html>