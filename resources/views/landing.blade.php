@extends('layouts.main')

@section('content')
    <section id="hero" class="relative border-b border-[#333333] bg-[#0A0A0A] py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 text-left sm:px-6 lg:px-8">
            <span class="mb-4 block text-[12px] font-semibold uppercase tracking-[0.14em] text-[#C1121F]">// Integrated Class
                Management</span>
            <h1 class="mb-6 max-w-4xl text-4xl font-bold uppercase leading-[1.1] tracking-normal text-[#F5F5F5] sm:text-5xl lg:text-6xl xl:text-[75.6px]">
                Website Manajemen Kelas XI-TKJ 3.
            </h1>
            <p class="mb-10 max-w-2xl text-[16px] font-light leading-[28px] text-[#B9B9B9] sm:text-[18px] sm:leading-[30px]">
                Pengelolaan Absensi, Keuangan, dan Rekapitulasi Nilai serta Absensi dengan sistem Peran/Role.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('login') }}"
                    class="inline-flex h-[46px] items-center justify-center rounded-full bg-[#C1121F] px-[24px] py-[14px] text-[14px] font-bold uppercase tracking-[0.08em] text-[#F5F5F5] transition hover:bg-[#A50F1A] sm:px-[32px] sm:text-[15px]">
                    Dashboard
                </a>
                <a href="#fitur"
                    class="inline-flex h-[46px] items-center justify-center rounded-full border border-[#C1121F] bg-[#0A0A0A] px-[24px] py-[14px] text-[14px] font-bold uppercase tracking-[0.08em] text-[#C1121F] transition hover:bg-[#121212] sm:px-[32px] sm:text-[15px]">
                    Fitur Website
                </a>
            </div>
        </div>
    </section>

    <section id="fitur" class="border-b border-[#333333] bg-[#0A0A0A] py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-10 sm:mb-12 lg:mb-[66px]">
                <h2 class="text-3xl font-bold uppercase text-[#F5F5F5] sm:text-4xl lg:text-[37.8px]">Role Based Access Control</h2>
                <p class="mt-2 text-[15px] font-light text-[#B9B9B9] sm:text-[16px]">Semua fitur dilengkapi dengan kontrol akses yang
                    berbasis peran/role.</p>
            </div>

            <div class="grid grid-cols-1 gap-6 lg:grid-cols-3 lg:gap-8">
                <div class="rounded-[18px] border border-[#333333] bg-[#181818] p-6 sm:p-8 lg:p-[32px]">
                    <div class="mb-4 text-[16px] font-bold uppercase tracking-[0.1em] text-[#C1121F] sm:text-[18px]">01 // ABSENSI</div>
                    <h3 class="mb-2 text-[18px] font-semibold text-[#F5F5F5] sm:text-[20px]">Management Sekertaris</h3>
                    <p class="text-[14px] font-light leading-[24px] text-[#B9B9B9]">Mencatat kehadiran seluruh siswa per
                        hari.</p>
                </div>
                <div class="rounded-[18px] border border-[#333333] bg-[#181818] p-6 sm:p-8 lg:p-[32px]">
                    <div class="mb-4 text-[16px] font-bold uppercase tracking-[0.1em] text-[#C1121F] sm:text-[18px]">02 // KEUANGAN</div>
                    <h3 class="mb-2 text-[18px] font-semibold text-[#F5F5F5] sm:text-[20px]">Management Bendahara</h3>
                    <p class="text-[14px] font-light leading-[24px] text-[#B9B9B9]">Mencatat rekapitulasi kas kelas yang
                        dikelola oleh Bendahara.</p>
                </div>
                <div class="rounded-[18px] border border-[#333333] bg-[#181818] p-6 sm:p-8 lg:p-[32px]">
                    <div class="mb-4 text-[16px] font-bold uppercase tracking-[0.1em] text-[#C1121F] sm:text-[18px]">03 // ANALYTICS</div>
                    <h3 class="mb-2 text-[18px] font-semibold text-[#F5F5F5] sm:text-[20px]">Management Wali Kelas</h3>
                    <p class="text-[14px] font-light leading-[24px] text-[#B9B9B9]">Otoritas penuh Wali Kelas dalam
                        mengelola performa nilai akademis maupun kehadiran.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="struktur" class="border-b border-[#333333] bg-[#0A0A0A] py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="mb-10 text-3xl font-bold uppercase text-[#F5F5F5] sm:text-4xl lg:mb-[66px] lg:text-[37.8px]">HIERARKI STRUKTUR KELAS</h2>

            <div class="flex flex-col items-center gap-6">
                <div class="rounded-full border border-[#C1121F] bg-[#121212] px-6 py-3 text-[14px] font-bold uppercase tracking-[0.1em] text-[#F5F5F5] sm:px-8 sm:text-[16px]">
                    WALI KELAS
                    <br>
                    <span class="text-[13px] font-light text-[#B9B9B9] sm:text-[14px]">Bpk. Nebriyanto Wahyu Saputro</span>
                </div>
                <div class="h-8 w-[2px] bg-[#333333]"></div>
                <div class="rounded-full border border-[#333333] bg-[#181818] px-6 py-3 text-[14px] font-bold uppercase tracking-[0.1em] text-[#F5F5F5] sm:px-8 sm:text-[16px]">
                    KETUA KELAS
                    <br>
                    <span class="text-[13px] font-light text-[#B9B9B9] sm:text-[14px]">Farhan Dwi Prayogi</span>
                </div>
                <div class="h-8 w-[2px] bg-[#333333]"></div>

                <div class="mt-4 grid w-full max-w-3xl grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3 lg:items-start">
                    <div class="rounded-[18px] border border-[#333333] bg-[#181818] p-4 text-center">
                        <span class="block text-[12px] font-bold uppercase tracking-wider text-[#C1121F]">SEKRETARIS</span>
                        <span class="block text-[14px] font-light text-[#B9B9B9]">Azimas Perwata Saputra (Admin)</span>
                        <span class="block text-[14px] font-light text-[#B9B9B9]">Fadhil Mudzakkir</span>
                    </div>
                    <div class="rounded-[18px] border border-[#333333] bg-[#181818] p-4 text-center">
                        <span class="block text-[12px] font-bold uppercase tracking-wider text-[#C1121F]">BENDAHARA</span>
                        <span class="block text-[14px] font-light text-[#B9B9B9]">Hafizh Nayaka Pramudya</span>
                        <span class="block text-[14px] font-light text-[#B9B9B9]">Rasya Putra Ardiansyah</span>
                    </div>
                    <div class="rounded-[18px] border border-[#333333] bg-[#181818] p-4 text-center sm:col-span-2 lg:col-span-1">
                        <span class="block text-[12px] font-bold uppercase tracking-wider text-[#C1121F]">ANGGOTA DIVISI</span>
                        <span class="text-[15px] font-bold text-[#c88080]">Divisi Keamanan & Kebersihan</span><br>
                        <span class="text-[13px] font-light text-[#B9B9B9]">Hafidh Muhammad Dafi (Ketua)</span><br>
                        <span class="text-[13px] font-light text-[#B9B9B9]">Yudhan Apriansyah</span><br>
                        <span class="text-[13px] font-light text-[#B9B9B9]">Arsyun Putra Darmawan</span><br>
                        <span class="text-[13px] font-light text-[#B9B9B9]">Faiz Ahmad Sofyan</span><br>
                        <span class="text-[15px] font-bold text-[#c88080]">Divisi Kegiatan Belajar Mengajar (KBM)</span><br>
                        <span class="text-[13px] font-light text-[#B9B9B9]">M. Rafa Caina(Ketua)</span><br>
                        <span class="text-[13px] font-light text-[#B9B9B9]">Raihan Habib Ramadhan</span><br>
                        <span class="text-[13px] font-light text-[#B9B9B9]">Young Ba'ana</span><br>
                        <span class="text-[13px] font-light text-[#B9B9B9]">M. Revansyah</span><br>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="visi-misi" class="bg-[#0A0A0A] py-20 sm:py-24 lg:py-28">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <h2 class="mb-10 text-center text-3xl font-bold uppercase text-[#F5F5F5] sm:text-4xl lg:mb-[66px] lg:text-[37.8px]">VISI & MISI KELAS</h2>

            <div class="rounded-[18px] border border-[#333333] bg-[#181818] p-6 sm:p-8 lg:p-10">
                <div class="mb-6">
                    <h3 class="mb-2 text-[18px] font-bold uppercase tracking-wider text-[#C1121F] sm:text-[20px]">// VISI</h3>
                    <p class="text-[16px] font-light italic leading-[28px] text-[#F5F5F5] sm:text-[18px] sm:leading-[30px]">
                        "Membentuk pribadi yang lebih baik untuk masa depan"
                    </p>
                </div>
                <div class="my-6 h-[1px] w-full bg-[#333333]"></div>
                <div>
                    <h3 class="mb-3 text-[18px] font-bold uppercase tracking-wider text-[#C1121F] sm:text-[20px]">// MISI</h3>
                    <ul class="list-none space-y-3 text-[15px] font-light text-[#B9B9B9] sm:text-[16px]">
                        <li class="flex gap-2"><span class="font-bold text-[#C1121F]">[✓]</span> Menguatamakan adab dan etika dalam berinteraksi.</li>
                        <li class="flex gap-2"><span class="font-bold text-[#C1121F]">[✓]</span> Menghadiri setiap mata pelajaran dengan sungguh-sungguh.</li>
                        <li class="flex gap-2"><span class="font-bold text-[#C1121F]">[✓]</span> Memanfaatkan fasilitas sekolah secara maksimal.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
