@extends('layouts.app')

@section('dashboard-content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <span class="text-[12px] font-bold uppercase tracking-[0.14em] text-[#C1121F]">// LOG DATA</span>
                <h1 class="text-3xl font-bold uppercase text-[#F5F5F5] sm:text-4xl lg:text-[37.8px]">MANAGEMENT ABSENSI</h1>
            </div>

            <form action="{{ route('absensi.index') }}" method="GET" class="w-full sm:w-auto">
                <input type="date" name="tanggal" value="{{ $tanggal }}" onchange="this.form.submit()"
                    class="w-full rounded-md border border-[#333333] bg-[#121212] px-4 py-2 text-[14px] font-light text-[#F5F5F5] transition focus:border-[#C1121F] focus:outline-none sm:w-auto">
            </form>
        </div>

        @if (session('success'))
            <div class="rounded-md border border-green-500 bg-green-500/10 p-3 text-[14px] text-green-500">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('absensi.store') }}" method="POST">
            @csrf
            <input type="hidden" name="tanggal" value="{{ $tanggal }}">

            <div class="mb-6 rounded-[18px] border border-[#333333] bg-[#181818] overflow-hidden">
                <table class="w-full border-collapse text-left block md:table">
                    
                    <thead class="hidden md:table-header-group">
                        <tr class="border-b border-[#333333] bg-[#121212] text-[12px] font-bold uppercase tracking-wider text-[#B9B9B9]">
                            <th class="p-4 w-[35%]">NAMA SISWA</th>
                            <th class="p-4 text-center w-[35%]">STATUS KEHADIRAN</th>
                            <th class="p-4 w-[30%]">KETERANGAN</th>
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-[#333333] text-[14px] font-light block md:table-row-group">
                        @foreach ($siswa as $s)
                            @php
                                $currentStatus = $absensi->get($s->id)->status ?? 'hadir';
                                $currentKet = $absensi->get($s->id)->keterangan ?? '';
                            @endphp
                            
                            <tr class="block p-4 space-y-4 md:space-y-0 md:p-0 md:table-row hover:bg-[#121212]/30 transition">
                                
                                <td class="block md:table-cell md:p-4 font-semibold text-[#F5F5F5]">
                                    <div class="flex flex-col">
                                        <span class="text-[25px] md:text-[14px]">{{ $s->name }}</span>
                                        <span class="text-[10px] text-[#B9B9B9] font-mono tracking-wider md:hidden uppercase mt-0.5">// Input Status.</span>
                                    </div>
                                </td>
                                
                                <td class="block md:table-cell md:p-4 text-center">
                                    <div class="grid grid-cols-2 gap-2 max-w-full md:flex md:justify-center md:gap-3">
                                        
                                        <label class="flex items-center gap-2 cursor-pointer bg-[#121212] border border-[#333333] px-3 py-2 md:py-1.5 rounded-md hover:border-[#C1121F] transition select-none justify-center">
                                            <input type="radio" name="kehadiran[{{ $s->id }}]" value="hadir" {{ $currentStatus == 'hadir' ? 'checked' : '' }} class="accent-[#C1121F] w-4 h-4 cursor-pointer">
                                            <span class="text-[#F5F5F5] text-[13px] font-bold uppercase tracking-wider">Hdr</span>
                                        </label>
                                        
                                        <label class="flex items-center gap-2 cursor-pointer bg-[#121212] border border-[#333333] px-3 py-2 md:py-1.5 rounded-md hover:border-yellow-500 transition select-none justify-center">
                                            <input type="radio" name="kehadiran[{{ $s->id }}]" value="sakit" {{ $currentStatus == 'sakit' ? 'checked' : '' }} class="accent-yellow-500 w-4 h-4 cursor-pointer">
                                            <span class="text-yellow-500 text-[13px] font-bold uppercase tracking-wider">Skt</span>
                                        </label>
                                        
                                        <label class="flex items-center gap-2 cursor-pointer bg-[#121212] border border-[#333333] px-3 py-2 md:py-1.5 rounded-md hover:border-blue-400 transition select-none justify-center">
                                            <input type="radio" name="kehadiran[{{ $s->id }}]" value="izin" {{ $currentStatus == 'izin' ? 'checked' : '' }} class="accent-blue-400 w-4 h-4 cursor-pointer">
                                            <span class="text-blue-400 text-[13px] font-bold uppercase tracking-wider">Izn</span>
                                        </label>
                                        
                                        <label class="flex items-center gap-2 cursor-pointer bg-[#121212] border border-[#333333] px-3 py-2 md:py-1.5 rounded-md hover:border-[#C1121F] transition select-none justify-center">
                                            <input type="radio" name="kehadiran[{{ $s->id }}]" value="alfa" {{ $currentStatus == 'alfa' ? 'checked' : '' }} class="accent-[#C1121F] w-4 h-4 cursor-pointer">
                                            <span class="text-[#C1121F] text-[13px] font-bold uppercase tracking-wider">Alf</span>
                                        </label>
                                        
                                    </div>
                                </td>
                                
                                <td class="block md:table-cell md:p-4">
                                    <input type="text" name="keterangan[{{ $s->id }}]" value="{{ $currentKet }}" placeholder="Catatan opsional..."
                                        class="w-full rounded-md border border-[#333333] bg-[#121212] px-3 py-2 text-[14px] font-light text-[#F5F5F5] transition focus:border-[#C1121F] focus:outline-none">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit"
                class="w-full rounded-full bg-[#C1121F] px-8 py-3.5 text-[14px] font-bold uppercase tracking-[0.08em] text-[#F5F5F5] transition hover:bg-[#A50F1A] sm:w-auto sm:text-[15px] cursor-pointer">
                SUBMIT ATTENDANCE LOG
            </button>
        </form>
    </div>
@endsection