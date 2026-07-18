@extends('layouts.app')

@section('dashboard-content')
    <div class="space-y-8">

        <div>
            <span class="text-[#C1121F] text-[12px] font-bold tracking-[0.14em] uppercase">// Main Dashboard</span>
            <h1 class="text-[37.8px] font-bold uppercase text-[#F5F5F5] leading-tight">Rangkuman Data Kelas</h1>
            <p class="text-[16px] text-[#B9B9B9] font-light mt-1">Ringkasan informasi penting tentang kelas.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

            <div class="bg-[#181818] border border-[#333333] rounded-[18px] p-[24px]">
                <span class="text-[12px] font-bold text-[#B9B9B9] uppercase tracking-wider block mb-1">TOTAL SISWA</span>
                <div class="text-[37.8px] font-bold text-[#F5F5F5]">{{ $total_siswa }}</div>
                <p class="text-[14px] text-[#B9B9B9] font-light mt-2">Yang terdata dalam database.</p>
            </div>

            <div class="bg-[#181818] border border-[#333333] rounded-[18px] p-[24px]">
                <span class="text-[12px] font-bold text-[#B9B9B9] uppercase tracking-wider block mb-1">MATA PELAJARAN</span>
                <div class="text-[37.8px] font-bold text-[#C1121F]">{{ $total_mapel }}</div>
                <p class="text-[14px] text-[#B9B9B9] font-light mt-2">Kurikulum semester ini.</p>
            </div>

            <div class="rounded-[18px] border border-[#333333] bg-[#181818] p-6 flex flex-col justify-between">
                <div>
                    <span class="text-[11px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9]">// ATTENDANCE RATE</span>
                    <h3 class="text-2xl font-black text-[#F5F5F5] mt-1">{{ $persentaseKelas }}%</h3>
                </div>

                <div class="w-full bg-[#121212] rounded-full h-2 mt-4 border border-[#333333]/50 overflow-hidden">
                    <div class="bg-[#C1121F] h-2 rounded-full transition-all duration-500"
                        style="width: {{ $persentaseKelas }}%"></div>
                </div>

                <span class="text-[10px] text-[#B9B9B9] font-mono mt-2 block">
                    Rata-rata kehadiran bulan ini
                </span>
            </div>

            <div class="bg-[#181818] border border-[#333333] rounded-[18px] p-[24px]">
                <span class="text-[12px] font-bold text-[#B9B9B9] uppercase tracking-wider block mb-1">SALDO KAS</span>
                <div class="text-[33.8px] font-bold text-green-500">Rp.{{ number_format($total_kas, 0, ',', '.') }}</div>
                <p class="text-[14px] text-[#B9B9B9] font-light mt-2">Total keuangan kelas yang tersimpan.</p>
            </div>

        </div>

        <div class="bg-[#181818] border border-[#333333] rounded-[18px] p-[32px]">
            <h3 class="text-[20px] font-bold text-[#F5F5F5] uppercase tracking-tight mb-4">// Developer Command Log</h3>
            <div class="bg-[#121212] border border-[#333333] rounded-md p-4 font-mono text-[14px] text-[#B9B9B9] space-y-2">
                <p><span class="text-[#C1121F]">[SYS]</span> Vercel Initialization completed.</p>
                <p><span class="text-green-500">[AUTH]</span> User logged in as: <span
                        class="text-[#F5F5F5]">{{ auth()->user()->name }}</span></p>
                <p><span class="text-yellow-500">[WARN]</span> Database loaded, ready for operations.</p>
            </div>
        </div>

    </div>
@endsection
