<nav class="bg-white/5 backdrop-blur border-b border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center gap-3">
                <span class="text-xl font-bold">📦 BoxBuddy</span>
            </div>

]            <div class="hidden sm:flex items-center gap-6 text-slate-200">

                <a href="{{ route('dashboard') }}"
                   class="{{ request()->routeIs('dashboard') ? 'text-white font-semibold' : 'hover:text-white' }}">
                    Dashboard
                </a>

                <a href="{{ route('orders.index') }}"
                   class="{{ request()->routeIs('orders.*') ? 'text-white font-semibold' : 'hover:text-white' }}">
                    Orders
                </a>

                <a href="{{ route('profile.edit') }}"
                   class="{{ request()->routeIs('profile.*') ? 'text-white font-semibold' : 'hover:text-white' }}">
                    Profile
                </a>

                @if(Auth::user()->role === 'driver')
                    <a href="{{ route('driver.dashboard') }}"
                       class="{{ request()->routeIs('driver.*') ? 'text-white font-semibold' : 'hover:text-white' }}">
                        Driver Panel
                    </a>
                @endif

                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                       class="{{ request()->routeIs('admin.*') ? 'text-white font-semibold' : 'hover:text-white' }}">
                        Admin Panel
                    </a>
                @endif

            </div>

            <div class="flex items-center gap-4">
                <span class="text-sm text-slate-300">{{ Auth::user()->name }}</span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="px-3 py-1 rounded-lg bg-white/10 hover:bg-white/20 text-sm transition">
                        Logout
                    </button>
                </form>
            </div>

        </div>
    </div>
</nav>