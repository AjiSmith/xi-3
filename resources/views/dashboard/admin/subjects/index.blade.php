@extends('layouts.app')

@section('dashboard-content')
<div class="space-y-8">
    <div>
        <span class="text-[12px] font-bold uppercase tracking-[0.14em] text-[#C1121F]">// DATABASE CURRICULUM</span>
        <h1 class="text-3xl font-bold uppercase text-[#F5F5F5] sm:text-4xl lg:text-[37.8px]">MATA PELAJARAN MANAGEMENT</h1>
    </div>

    @if (session('success'))
        <div class="rounded-md border border-green-500 bg-green-500/10 p-3 text-[14px] text-green-500">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8 items-start">
        <div class="rounded-[18px] border border-[#333333] bg-[#181818] p-6">
            <h3 class="text-[16px] font-bold text-[#C1121F] uppercase tracking-wider mb-4">// REGISTRASI MAPEL</h3>
            <form action="{{ route('subjects.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-1">KODE MAPEL</label>
                    <input type="text" name="kode_mapel" placeholder="Contoh: INF-XI" required
                        class="w-full rounded-md border border-[#333333] bg-[#121212] px-3 py-2 text-[14px] text-[#F5F5F5] focus:border-[#C1121F] focus:outline-none transition">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-1">NAMA MATA PELAJARAN</label>
                    <input type="text" name="nama_mapel" placeholder="Contoh: Informatika" required
                        class="w-full rounded-md border border-[#333333] bg-[#121212] px-3 py-2 text-[14px] text-[#F5F5F5] focus:border-[#C1121F] focus:outline-none transition">
                </div>
                <div>
                    <label class="block text-[11px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-1">STANDAR KKM</label>
                    <input type="number" name="kkm" value="75" min="0" max="100" required
                        class="w-full rounded-md border border-[#333333] bg-[#121212] px-3 py-2 text-[14px] text-[#F5F5F5] focus:border-[#C1121F] focus:outline-none transition">
                </div>
                <button type="submit" class="w-full rounded-full bg-[#C1121F] hover:bg-[#A50F1A] text-[#F5F5F5] text-[14px] font-bold uppercase tracking-[0.08em] py-3 transition cursor-pointer">
                    DEPLOY SUBJECT
                </button>
            </form>
        </div>

        <div class="xl:col-span-2 rounded-[18px] border border-[#333333] bg-[#181818] overflow-hidden">
            <table class="w-full border-collapse text-left block md:table">
                <thead class="hidden md:table-header-group">
                    <tr class="border-b border-[#333333] bg-[#121212] text-[12px] font-bold uppercase tracking-wider text-[#B9B9B9]">
                        <th class="p-4">KODE</th>
                        <th class="p-4">NAMA MATA PELAJARAN</th>
                        <th class="p-4 text-center">KKM</th>
                        <th class="p-4 text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#333333] text-[14px] font-light block md:table-row-group">
                    @if($subjects->isEmpty())
                        <tr class="block md:table-row"><td colspan="4" class="p-4 text-center text-[#B9B9B9] italic">Belum ada mata pelajaran terdata.</td></tr>
                    @endif
                    @foreach($subjects as $subject)
                        <tr class="block p-4 space-y-2 md:space-y-0 md:p-0 md:table-row hover:bg-[#121212]/30 transition">
                            <td class="block md:table-cell md:p-4 font-mono text-[#C1121F] font-bold">
                                <span class="md:hidden text-[#B9B9B9] font-sans font-light text-[12px] block">// KODE:</span>
                                [ {{ $subject->kode_mapel }} ]
                            </td>
                            <td class="block md:table-cell md:p-4 text-[#F5F5F5] font-semibold">
                                <span class="md:hidden text-[#B9B9B9] font-sans font-light text-[12px] block">// MAPEL:</span>
                                {{ $subject->nama_mapel }}
                            </td>
                            <td class="block md:table-cell md:p-4 md:text-center text-green-500 font-bold">
                                <span class="md:hidden text-[#B9B9B9] font-sans font-light text-[12px] inline">// KKM: </span>
                                {{ $subject->kkm }}
                            </td>
                            <td class="block md:table-cell md:p-4 md:text-center pt-3 border-t border-[#333333]/50 md:border-none">
                                <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('Hapus mapel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-full md:w-auto text-[#C1121F] border border-[#C1121F] hover:bg-[#C1121F] hover:text-[#F5F5F5] px-3 py-1 rounded text-[12px] font-bold uppercase tracking-wider transition cursor-pointer">
                                        DELETE
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection