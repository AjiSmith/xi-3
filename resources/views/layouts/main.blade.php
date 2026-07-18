<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valrise ClassManager</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Blinker:wght@300;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        body { font-family: 'Blinker', sans-serif; }
    </style>
</head>
<body class="bg-[#0A0A0A] text-[#F5F5F5] flex flex-col min-h-screen antialiased">

    <nav class="bg-[#0A0A0A] border-b border-[#333333] sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-3 py-3 md:flex-row md:items-center md:justify-between md:py-0 md:h-16">
                <div class="flex items-center justify-between gap-3">
                    <span class="text-[18px] sm:text-[20px] font-bold text-[#C1121F] uppercase tracking-[0.12em]">XI-3 Management</span>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full bg-[#C1121F] px-4 py-2 text-[13px] font-bold uppercase tracking-[0.08em] text-[#F5F5F5] transition hover:bg-[#A50F1A] md:hidden">
                        Dashboard
                    </a>
                </div>
                <div class="flex flex-wrap items-center justify-center gap-3 text-center md:justify-end md:gap-6 lg:gap-8">
                    <a href="/#hero" class="text-[12px] sm:text-[14px] font-bold text-[#F5F5F5] hover:text-[#C1121F] uppercase tracking-[0.12em] transition">Beranda</a>
                    <a href="/#fitur" class="text-[12px] sm:text-[14px] font-bold text-[#B9B9B9] hover:text-[#C1121F] uppercase tracking-[0.12em] transition">Fitur</a>
                    <a href="/#struktur" class="text-[12px] sm:text-[14px] font-bold text-[#B9B9B9] hover:text-[#C1121F] uppercase tracking-[0.12em] transition">Struktur</a>
                    <a href="/#visi-misi" class="text-[12px] sm:text-[14px] font-bold text-[#B9B9B9] hover:text-[#C1121F] uppercase tracking-[0.12em] transition">Visi Misi</a>
                </div>
                <div class="hidden md:block">
                    <a href="{{ route('login') }}" class="inline-flex h-11.5 items-center rounded-full bg-[#C1121F] px-8 py-3.5 text-[15px] font-bold uppercase tracking-[0.08em] text-[#F5F5F5] transition hover:bg-[#A50F1A]">
                        Dashboard
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="grow">
        @yield('content')
    </main>

    <footer class="bg-[#0A0A0A] text-[#B9B9B9] py-8 border-t border-[#333333]">
        <div class="max-w-7xl mx-auto px-4 text-center text-[14px] font-light">
            <p>&copy; {{ date('Y') }} Azimas Perwata Saputra. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>