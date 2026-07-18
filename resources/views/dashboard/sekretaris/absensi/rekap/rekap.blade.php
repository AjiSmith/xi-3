@extends('layouts.app')

@section('dashboard-content')
    <div class="space-y-6">

        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <span class="text-[12px] font-bold uppercase tracking-[0.14em] text-[#C1121F]">// ATTENDANCE METRICS</span>
                <h1 class="text-3xl font-bold uppercase text-[#F5F5F5] sm:text-4xl lg:text-[37.8px]">REKAPITULASI ABSENSI
                </h1>
            </div>
        </div>

        <div class="rounded-[18px] border border-[#333333] bg-[#181818] p-4 sm:p-6">
            <form action="{{ route('absensi.rekap') }}" method="GET" class="flex flex-col gap-4 md:flex-row md:items-end">
                <div class="flex-1">
                    <label class="block text-[11px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-1">TANGGAL
                        AWAL</label>
                    <input type="date" name="start_date" value="{{ $startDate }}" required
                        class="w-full rounded-md border border-[#333333] bg-[#121212] px-3 py-2 text-[14px] text-[#F5F5F5] focus:border-[#C1121F] focus:outline-none transition">
                </div>
                <div class="flex-1">
                    <label class="block text-[11px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-1">TANGGAL
                        AKHIR</label>
                    <input type="date" name="end_date" value="{{ $endDate }}" required
                        class="w-full rounded-md border border-[#333333] bg-[#121212] px-3 py-2 text-[14px] text-[#F5F5F5] focus:border-[#C1121F] focus:outline-none transition">
                </div>
                <div class="w-full md:w-auto">
                    <button type="submit"
                        class="w-full md:w-auto rounded-md bg-[#C1121F] hover:bg-[#A50F1A] text-[#F5F5F5] text-[14px] font-bold uppercase tracking-[0.08em] px-6 py-2.5 transition cursor-pointer">
                        FILTER REKAP
                    </button>
                </div>
            </form>
        </div>

        <div class="rounded-[18px] border border-[#333333] bg-[#181818] overflow-hidden">
            <table class="w-full border-collapse text-left block md:table">

                <thead class="hidden md:table-header-group">
                    <tr
                        class="border-b border-[#333333] bg-[#121212] text-[12px] font-bold uppercase tracking-wider text-[#B9B9B9]">
                        <th class="p-4 w-[35%]">NAMA SISWA</th>
                        <th class="p-4 text-center text-green-500 w-[10%]">HADIR</th>
                        <th class="p-4 text-center text-blue-400 w-[10%]">SAKIT</th>
                        <th class="p-4 text-center text-yellow-500 w-[10%]">IZIN</th>
                        <th class="p-4 text-center text-[#C1121F] w-[10%]">ALFA</th>
                        <th class="p-4 text-center text-[#B9B9B9] w-[10%]">TOTAL HARI</th>
                        <th class="p-4 text-center w-[15%]">RATE</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-[#333333] text-[14px] font-light block md:table-row-group">
                    @foreach ($siswa as $s)
                        @php
                            $data = $rekap[$s->id];
                        @endphp

                        <tr class="block p-4 space-y-3 md:space-y-0 md:p-0 md:table-row hover:bg-[#121212]/30 transition">
                            {{-- Nama Siswa --}} <td class="block md:table-cell md:p-4 font-semibold text-[#F5F5F5]"> <span
                                    class="text-[15px] md:text-[14px]">{{ $s->name }}</span> </td>
                            {{-- Tampilan Mobile --}} <td class="block md:hidden">
                                <div class="grid grid-cols-4 gap-2">
                                    <div
                                        class="flex flex-col items-center p-2 rounded-md border border-[#333333] bg-[#121212]">
                                        <span class="text-[10px] uppercase text-[#B9B9B9]">Hadir</span> <span
                                            class="text-[14px] font-bold text-green-500"> {{ $data['hadir'] }} </span>
                                    </div>
                                    <div
                                        class="flex flex-col items-center p-2 rounded-md border border-[#333333] bg-[#121212]">
                                        <span class="text-[10px] uppercase text-[#B9B9B9]">Sakit</span> <span
                                            class="text-[14px] font-bold text-blue-400"> {{ $data['sakit'] }} </span> </div>
                                    <div
                                        class="flex flex-col items-center p-2 rounded-md border border-[#333333] bg-[#121212]">
                                        <span class="text-[10px] uppercase text-[#B9B9B9]">Izin</span> <span
                                            class="text-[14px] font-bold text-yellow-500"> {{ $data['izin'] }} </span>
                                    </div>
                                    <div
                                        class="flex flex-col items-center p-2 rounded-md border border-[#333333] bg-[#121212]">
                                        <span class="text-[10px] uppercase text-[#B9B9B9]">Alfa</span> <span
                                            class="text-[14px] font-bold text-[#C1121F]"> {{ $data['alfa'] }} </span> </div>
                                </div>
                            </td> {{-- Tampilan Desktop --}} <td class="hidden md:table-cell p-4 text-center text-green-500">
                                {{ $data['hadir'] }} </td>
                            <td class="hidden md:table-cell p-4 text-center text-blue-400"> {{ $data['sakit'] }} </td>
                            <td class="hidden md:table-cell p-4 text-center text-yellow-500"> {{ $data['izin'] }} </td>
                            <td class="hidden md:table-cell p-4 text-center text-[#C1121F]"> {{ $data['alfa'] }} </td>
                            {{-- Total Hari --}} <td class="hidden md:table-cell p-4 text-center text-[#B9B9B9] font-mono">
                                {{ $data['total'] }} Hari </td> {{-- Persentase --}} <td
                                class="block pt-3 border-t border-[#333333]/50 md:border-t-0 md:table-cell md:p-4 text-right md:text-center">
                                <div class="flex items-center justify-between md:justify-center"> <span
                                        class="{{ $data['persentase'] >= 85 ? 'text-green-500 border-green-500/30 bg-green-500/5' : 'text-[#C1121F] border-[#C1121F]/30 bg-[#C1121F]/5' }} border px-3 py-1 rounded-md text-[13px] font-mono">
                                        {{ $data['persentase'] }}% </span> </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
