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

    <nav class="bg-[#0A0A0A] border-b border-[#333333] sticky top-0 z-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <span class="text-[20px] font-bold text-[#C1121F] uppercase tracking-[0.12em]">XI-3 Management</span>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-[#0A0A0A] text-[#B9B9B9] py-8 border-t border-[#333333]">
        <div class="max-w-7xl mx-auto px-4 text-center text-[14px] font-light">
            <p>&copy; {{ date('Y') }} Azimas Perwata Saputra. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>