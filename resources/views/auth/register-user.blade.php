<x-layouts.guest-full>
    <div class="min-h-screen flex items-center justify-center p-6
                bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))]
                from-blue-900 via-slate-900 to-black">

        <div class="max-w-md w-full space-y-8">

            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8 shadow-2xl">
                <div class="text-center mb-6">
                    <h2 class="text-2xl font-bold text-white">Daftar sebagai User 🙋</h2>
                    <p class="text-slate-400 text-sm mt-2">Kirim barang dengan mudah!</p>
                </div>

                <form method="POST" action="{{ route('register.store') }}" class="space-y-6">
                    @csrf
                    <input type="hidden" name="role" value="user">

                    <!-- Name -->
                    <div>
                        <label class="block text-slate-300 text-sm font-medium mb-1">Nama Lengkap</label>
                        <input type="text" name="name" :value="old('name')" required autofocus
                            class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-500 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            placeholder="Nama Anda">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-slate-300 text-sm font-medium mb-1">Email Address</label>
                        <input type="email" name="email" :value="old('email')" required
                            class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-500 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            placeholder="nama@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label class="block text-slate-300 text-sm font-medium mb-1">Password</label>
                        <input type="password" name="password" required
                            class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-500 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            placeholder="••••••••">
                             <p class="mt-1 text-xs text-slate-400">
                                Password minimal 8 karakter
                            </p>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label class="block text-slate-300 text-sm font-medium mb-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full bg-white/10 border border-white/10 rounded-xl px-4 py-2.5 text-white placeholder-slate-500 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition"
                            placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <button
                        class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 rounded-xl transition duration-200 shadow-lg shadow-blue-600/20">
                        Daftar Sekarang
                    </button>

                    <div class="text-center text-sm text-slate-400">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-blue-400 hover:text-blue-300 transition">Masuk
                            disini</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.guest-full>