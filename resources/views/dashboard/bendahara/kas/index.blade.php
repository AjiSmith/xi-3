@extends('layouts.app')

@section('dashboard-content')
<div class="space-y-8">
    
    <div>
        <span class="text-[#C1121F] text-[12px] font-bold tracking-[0.14em] uppercase">// FINANCIAL LOG</span>
        <h1 class="text-[37.8px] font-bold uppercase text-[#F5F5F5]">MANAGEMENT KAS KELAS</h1>
    </div>

    @if(session('success'))
        <div class="bg-green-500/10 border border-green-500 text-green-500 text-[14px] p-3 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
        
        <div class="bg-[#181818] border border-[#333333] rounded-[18px] p-[24px]">
            <h3 class="text-[18px] font-bold text-[#C1121F] uppercase tracking-wider mb-4">// INPUT MUTASI</h3>
            
            <form action="{{ route('kas.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <div>
                    <label class="block text-[12px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-1">TANGGAL TRANSAKSI</label>
                    <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" required
                        class="w-full bg-[#121212] border border-[#333333] text-[#F5F5F5] rounded-md px-3 py-2 text-[14px] focus:outline-none focus:border-[#C1121F]">
                </div>

                <div>
                    <label class="block text-[12px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-1">TIPE MUTASI</label>
                    <select name="tipe" id="tipe_kas" onchange="toggleSiswaDropdown()"
                        class="w-full bg-[#121212] border border-[#333333] text-[#F5F5F5] rounded-md px-3 py-2 text-[14px] focus:outline-none focus:border-[#C1121F]">
                        <option value="masuk">Uang Masuk (Iuran)</option>
                        <option value="keluar">Uang Keluar (Pengeluaran)</option>
                    </select>
                </div>

                <div id="siswa_wrapper">
                    <label class="block text-[12px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-1">IDENTITAS SISWA</label>
                    <select name="user_id"
                        class="w-full bg-[#121212] border border-[#333333] text-[#F5F5F5] rounded-md px-3 py-2 text-[14px] focus:outline-none focus:border-[#C1121F]">
                        <option value="">-- Pilih Pembayar --</option>
                        @foreach($siswa as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-[12px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-1">NOMINAL (RP)</label>
                    <input type="number" name="jumlah" placeholder="Contoh: 5000" required min="1"
                        class="w-full bg-[#121212] border border-[#333333] text-[#F5F5F5] rounded-md px-3 py-2 text-[14px] focus:outline-none focus:border-[#C1121F]">
                </div>

                <div>
                    <label class="block text-[12px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-1">KETERANGAN</label>
                    <input type="text" name="keterangan" placeholder="Iuran Mingguan / Beli Sapu" required
                        class="w-full bg-[#121212] border border-[#333333] text-[#F5F5F5] rounded-md px-3 py-2 text-[14px] focus:outline-none focus:border-[#C1121F]">
                </div>

                <button type="submit" class="w-full bg-[#C1121F] hover:bg-[#A50F1A] text-[#F5F5F5] text-[14px] font-bold uppercase tracking-[0.08em] py-3 rounded-full transition cursor-pointer">
                    EXECUTE MUTATION
                </button>
            </form>
        </div>

        <div class="lg:col-span-2 space-y-6">
            
            <div class="bg-[#181818] border border-[#333333] rounded-[18px] p-[24px] flex justify-between items-center">
                <div>
                    <span class="text-[12px] font-bold text-[#B9B9B9] uppercase tracking-wider block">CURRENT BALANCES</span>
                    <div class="text-[37.8px] font-bold text-green-500">Rp {{ number_format($saldo, 0, ',', '.') }}</div>
                </div>
                <div class="text-[32px]">💰</div>
            </div>

            <div class="bg-[#181818] border border-[#333333] rounded-[18px] overflow-hidden">
                <div class="p-4 bg-[#121212] border-b border-[#333333]">
                    <span class="text-[12px] font-bold text-[#F5F5F5] uppercase tracking-wider">// RECENT TRANSACTION LOG</span>
                </div>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-[#333333] text-[#B9B9B9] text-[12px] font-bold uppercase tracking-wider bg-[#121212]/30">
                            <th class="p-4">TANGGAL</th>
                            <th class="p-4">KETERANGAN / SISWA</th>
                            <th class="p-4">TIPE</th>
                            <th class="p-4 text-right">JUMLAH</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#333333] text-[14px] font-light">
                        @if($logs->isEmpty())
                            <tr>
                                <td colspan="4" class="p-4 text-center text-[#B9B9B9] italic">Belum ada rekaman log transaksi.</td>
                            </tr>
                        @endif
                        @foreach($logs as $log)
                        <tr class="hover:bg-[#121212]/50 transition">
                            <td class="p-4 text-[#B9B9B9]">{{ \Carbon\Carbon::parse($log->tanggal)->format('d/m/Y') }}</td>
                            <td class="p-4">
                                @if($log->user)
                                <span class="block text-[#F5F5F5] font-semibold">{{ $log->user->name }}</span>
                                                                @endif
                                    <span class="block text-[12px] text-[#B9B9B9]">{{ $log->keterangan }}</span>

                            </td>
                            <td class="p-4">
                                @if($log->tipe === 'masuk')
                                    <span class="text-green-500 font-bold uppercase text-[12px]">[ MASUK ]</span>
                                @else
                                    <span class="text-[#C1121F] font-bold uppercase text-[12px]">[ KELUAR ]</span>
                                @endif
                            </td>
                            <td class="p-4 text-right font-semibold {{ $log->tipe === 'masuk' ? 'text-green-500' : 'text-[#C1121F]' }}">
                                {{ $log->tipe === 'masuk' ? '+' : '-' }} Rp {{ number_format($log->jumlah, 0, ',', '.') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<script>
    function toggleSiswaDropdown() {
        var tipe = document.getElementById('tipe_kas').value;
        var wrapper = document.getElementById('siswa_wrapper');
        if (tipe === 'keluar') {
            wrapper.style.display = 'none';
        } else {
            wrapper.style.display = 'block';
        }
    }
</script>
@endsection