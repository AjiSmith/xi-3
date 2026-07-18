<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Blinker:wght@300;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body {
            font-family: 'Blinker', sans-serif;
        }
    </style>
</head>

<body class="flex min-h-screen bg-[#0A0A0A] text-[#F5F5F5] antialiased relative overflow-x-hidden">

    <div id="sidebar-backdrop" onclick="toggleMobileSidebar()"
        class="fixed inset-0 bg-black/60 z-40 hidden lg:hidden transition-opacity"></div>

    <aside id="main-sidebar"
        class="fixed inset-y-0 left-0 w-64 border-r border-[#333333] bg-[#0A0A0A] flex flex-col justify-between z-50 transform -translate-x-full lg:translate-x-0 lg:static lg:h-screen transition-transform duration-300 ease-in-out">
        <div>
            <div class="flex h-16 items-center justify-between border-b border-[#333333] px-4 sm:px-6">
                <span class="text-[16px] font-bold uppercase tracking-widest text-[#C1121F] sm:text-[18px]">XI-3
                    Database</span>
                <button onclick="toggleMobileSidebar()"
                    class="lg:hidden text-[#B9B9B9] hover:text-[#C1121F] text-xl cursor-pointer p-1">
                    ✕
                </button>
            </div>

            <div class="border-b border-[#333333] bg-[#121212] p-4">
                <span class="block text-[12px] font-bold uppercase tracking-wider text-[#C1121F]">// Identitas</span>
                <span class="block truncate text-[15px] font-semibold sm:text-[16px]">{{ auth()->user()->name }}</span>
                <span
                    class="mt-1 inline-block rounded-full bg-[#1B1B1B] px-2 py-0.5 text-[12px] font-bold uppercase tracking-widest text-[#F5F5F5]">
                    {{ auth()->user()->role }}
                </span>
            </div>

            <nav class="space-y-2 p-4">
                <span
                    class="mb-2 block px-2 text-[12px] font-bold uppercase tracking-[0.14em] text-[#B9B9B9]">Management
                    Menu</span>

                <a href="{{ route('dashboard') }}"
                    class="flex items-center rounded-full px-4 py-3 text-[12px] font-bold uppercase tracking-[0.12em] transition sm:text-[14px] {{ request()->routeIs('dashboard') ? 'border border-[#C1121F] bg-[#181818] text-[#F5F5F5]' : 'text-[#B9B9B9] hover:text-[#C1121F]' }}">
                    {{ request()->routeIs('dashboard') ? '[x]' : '[ ]' }} DASHBOARD
                </a>

                @if (auth()->user()->role == 'admin')
                    <a href="{{ route('users.index') }}"
                        class="flex items-center rounded-full px-4 py-3 text-[12px] font-bold uppercase tracking-[0.12em] transition sm:text-[14px] {{ request()->routeIs('users.*') ? 'border border-[#C1121F] bg-[#181818] text-[#F5F5F5]' : 'text-[#B9B9B9] hover:text-[#C1121F]' }}">
                        {{ request()->routeIs('users.*') ? '[x]' : '[ ]' }} MANAGEMENT USER
                    </a>
                    <a href="{{ route('subjects.index') }}"
                        class="flex items-center rounded-full px-4 py-3 text-[12px] font-bold uppercase tracking-[0.12em] transition sm:text-[14px] {{ request()->routeIs('subjects.*') ? 'border border-[#C1121F] bg-[#181818] text-[#F5F5F5]' : 'text-[#B9B9B9] hover:text-[#C1121F]' }}">
                        {{ request()->routeIs('subjects.*') ? '[x]' : '[ ]' }} KURIKULUM
                    </a>
                @endif

                @if (in_array(auth()->user()->role, ['admin', 'sekretaris']))
                    <div class="group">
                        <div
                            class="flex items-center rounded-full px-4 py-3 text-[12px] font-bold uppercase tracking-[0.12em] sm:text-[14px] {{ request()->routeIs('absensi.*') ? 'border border-[#C1121F] bg-[#181818] text-[#F5F5F5]' : 'text-[#B9B9B9]' }}">
                            {{ request()->routeIs('absensi.*') ? '[x]' : '[ ]' }} <span class="ml-2">ABSENSI</span> </div>
                        <div class="hidden group-hover:flex flex-col gap-1 mt-2 ml-6 border-l border-[#333333] pl-4"> <a
                                href="{{ route('absensi.index') }}"
                                class="rounded-md px-3 py-2 text-[12px] font-semibold uppercase tracking-wider transition {{ request()->routeIs('absensi.index') ? 'text-[#C1121F]' : 'text-[#B9B9B9] hover:text-[#C1121F]' }}">
                                → INPUT </a> <a href="{{ route('absensi.rekap') }}"
                                class="rounded-md px-3 py-2 text-[12px] font-semibold uppercase tracking-wider transition {{ request()->routeIs('absensi.rekap') ? 'text-[#C1121F]' : 'text-[#B9B9B9] hover:text-[#C1121F]' }}">
                                → REKAP </a> </div>
                    </div>
                @endif

                @if (in_array(auth()->user()->role, ['admin', 'bendahara']))
                    <a href="{{ route('kas.index') }}"
                        class="flex items-center rounded-full px-4 py-3 text-[12px] font-bold uppercase tracking-[0.12em] transition sm:text-[14px] {{ request()->routeIs('kas.*') ? 'border border-[#C1121F] bg-[#181818] text-[#F5F5F5]' : 'text-[#B9B9B9] hover:text-[#C1121F]' }}">
                        {{ request()->routeIs('kas.*') ? '[x]' : '[ ]' }} BENDAHARA MENU
                    </a>
                @endif

                @if (in_array(auth()->user()->role, ['admin', 'walikelas']))
                    <a href="{{ route('nilai.index') }}"
                        class="flex items-center rounded-full px-4 py-3 text-[12px] font-bold uppercase tracking-[0.12em] transition sm:text-[14px] {{ request()->routeIs('nilai.*') ? 'border border-[#C1121F] bg-[#181818] text-[#F5F5F5]' : 'text-[#B9B9B9] hover:text-[#C1121F]' }}">
                        {{ request()->routeIs('nilai.*') ? '[x]' : '[ ]' }} NILAI KURIKULUM
                    </a>
                @endif
            </nav>
        </div>

        <div class="border-t border-[#333333] p-4">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="w-full cursor-pointer rounded-full border border-[#C1121F] bg-[#121212] px-4 py-3 text-[13px] font-bold uppercase tracking-[0.08em] text-[#C1121F] transition hover:bg-[#C1121F] hover:text-[#F5F5F5] sm:text-[14px]">
                    ABORT SESSION (LOGOUT)
                </button>
            </form>
        </div>
    </aside>

    <div class="flex flex-1 flex-col min-w-0 overflow-x-hidden">

        <header class="border-b border-[#333333] bg-[#0A0A0A] px-4 py-4 sm:px-6 lg:px-8 sticky top-0 z-30">
            <div class="flex items-center justify-between gap-4">
                <div class="flex items-center gap-3">
                    <button onclick="toggleMobileSidebar()"
                        class="lg:hidden text-[#F5F5F5] bg-[#121212] border border-[#333333] p-2 rounded-md hover:border-[#C1121F] cursor-pointer focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div class="text-[13px] font-bold uppercase tracking-wider text-[#B9B9B9] sm:text-[14px]">
                        STATUS: <span class="text-green-500">ONLINE</span>
                    </div>
                </div>
                <div class="text-[13px] font-light text-[#B9B9B9] sm:text-[14px]">
                    {{ date('l, d F Y') }}
                </div>
            </div>
        </header>

        <main class="flex-1 p-4 sm:p-6 lg:p-8 overflow-x-auto">
            @yield('dashboard-content')
        </main>
    </div>

    <script>
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('main-sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');

            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.add('hidden');
            }
        }
    </script>
</body>

</html>
