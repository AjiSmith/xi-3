@extends('layouts.app')

@section('dashboard-content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <span class="text-[12px] font-bold uppercase tracking-[0.14em] text-[#C1121F]">// ACADEMIC RECORD</span>
                <h1 class="text-3xl font-bold uppercase text-[#F5F5F5] sm:text-4xl lg:text-[37.8px]">MANAGEMENT NILAI</h1>
            </div>

            <form action="{{ route('nilai.index') }}" method="GET" class="w-full sm:w-auto">
                <select name="subject" onchange="this.form.submit()"
                    class="w-full rounded-md border border-[#333333] bg-[#121212] px-4 py-2 text-[14px] font-semibold text-[#F5F5F5] transition focus:border-[#C1121F] focus:outline-none sm:w-auto cursor-pointer">
                    @if($subjects->isEmpty())
                        <option value="Matematika">Matematika (Default)</option>
                    @else
                        @foreach($subjects as $sub)
                            <option value="{{ $sub->nama_mapel }}" {{ $mapel == $sub->nama_mapel ? 'selected' : '' }}>{{ $sub->nama_mapel }}</option>
                        @endforeach
                    @endif
                </select>
            </form>
        </div>

        @if (session('success'))
            <div class="rounded-md border border-green-500 bg-green-500/10 p-3 text-[14px] text-green-500">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('nilai.store') }}" method="POST">
            @csrf
            <input type="hidden" name="mata_pelajaran" value="{{ $mapel }}">

            <div class="mb-6 rounded-[18px] border border-[#333333] bg-[#181818] overflow-hidden">
                <table class="w-full border-collapse text-left block md:table">
                    
                    <thead class="hidden md:table-header-group">
                        <tr class="border-b border-[#333333] bg-[#121212] text-[12px] font-bold uppercase tracking-wider text-[#B9B9B9]">
                            <th class="p-4 w-[40%]">NAMA SISWA</th>
                            <th class="p-4 text-center w-[15%]">TUGAS</th>
                            <th class="p-4 text-center w-[15%]">UTS</th>
                            <th class="p-4 text-center w-[15%]">UAS</th>
                            <th class="p-4 text-center w-[15%]">RATA-RATA</th>
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-[#333333] text-[14px] font-light block md:table-row-group">
                        @foreach ($siswa as $s)
                            @php
                                $tugas = $grades->get($s->id)->tugas ?? 0;
                                $uts = $grades->get($s->id)->uts ?? 0;
                                $uas = $grades->get($s->id)->uas ?? 0;
                                $rataRata = round(($tugas + $uts + $uas) / 3, 1);
                            @endphp
                            
                            <tr class="block p-4 space-y-4 md:space-y-0 md:p-0 md:table-row hover:bg-[#121212]/30 transition">
                                
                                <td class="block md:table-cell md:p-4 font-semibold text-[#F5F5F5]">
                                    <div class="flex flex-col">
                                        <span class="text-[15px] md:text-[14px]">{{ $s->name }}</span>
                                        <span class="text-[10px] text-[#B9B9B9] font-mono tracking-wider md:hidden uppercase mt-0.5">// Input Komponen Nilai</span>
                                    </div>
                                </td>
                                
                                <td class="block md:table-cell md:p-4 text-center">
                                    <div class="grid grid-cols-3 gap-3 md:flex md:justify-center md:gap-2">
                                        
                                        <div class="flex flex-col items-center w-full md:w-[70px]">
                                            <label class="text-[10px] font-bold text-[#B9B9B9] uppercase mb-1 md:hidden">Tugas</label>
                                            <input type="number" name="grades[{{ $s->id }}][tugas]" value="{{ $tugas }}" min="0" max="100" required
                                                class="w-full text-center rounded-md border border-[#333333] bg-[#121212] px-2 py-2 text-[14px] text-[#F5F5F5] transition focus:border-[#C1121F] focus:outline-none">
                                        </div>

                                        <div class="flex flex-col items-center w-full md:w-[70px]">
                                            <label class="text-[10px] font-bold text-[#B9B9B9] uppercase mb-1 md:hidden">UTS</label>
                                            <input type="number" name="grades[{{ $s->id }}][uts]" value="{{ $uts }}" min="0" max="100" required
                                                class="w-full text-center rounded-md border border-[#333333] bg-[#121212] px-2 py-2 text-[14px] text-[#F5F5F5] transition focus:border-[#C1121F] focus:outline-none">
                                        </div>

                                        <div class="flex flex-col items-center w-full md:w-[70px]">
                                            <label class="text-[10px] font-bold text-[#B9B9B9] uppercase mb-1 md:hidden">UAS</label>
                                            <input type="number" name="grades[{{ $s->id }}][uas]" value="{{ $uas }}" min="0" max="100" required
                                                class="w-full text-center rounded-md border border-[#333333] bg-[#121212] px-2 py-2 text-[14px] text-[#F5F5F5] transition focus:border-[#C1121F] focus:outline-none">
                                        </div>

                                    </div>
                                </td>

                                <td class="hidden md:table-cell"></td>
                                <td class="hidden md:table-cell"></td>

                                <td class="block pt-3 border-t border-[#333333]/50 md:border-t-0 md:table-cell md:p-4 text-right md:text-center font-bold">
                                    <div class="flex items-center justify-between md:justify-center">
                                        <span class="text-[11px] text-[#B9B9B9] uppercase font-mono tracking-wider md:hidden">// Rata-Rata:</span>
                                        <span class="{{ $rataRata >= 75 ? 'text-green-500 border-green-500/30 bg-green-500/5' : 'text-[#C1121F] border-[#C1121F]/30 bg-[#C1121F]/5' }} border px-3 py-1 rounded text-[13px] md:bg-transparent md:border-none md:p-0">
                                            {{ $rataRata }}
                                        </span>
                                    </div>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <button type="submit" class="w-full rounded-full bg-[#C1121F] px-8 py-3.5 text-[14px] font-bold uppercase tracking-[0.08em] text-[#F5F5F5] transition hover:bg-[#A50F1A] sm:w-auto sm:text-[15px] cursor-pointer">
                SYNCHRONIZE GRADES SYSTEM
            </button>
        </form>
    </div>
@endsection