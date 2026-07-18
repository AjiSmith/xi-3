@extends('layouts.app')

@section('dashboard-content')
<div class="max-w-xl space-y-6">
    <div>
        <span class="text-[#C1121F] text-[12px] font-bold tracking-[0.14em] uppercase">// INTRUSION</span>
        <h1 class="text-[37.8px] font-bold uppercase text-[#F5F5F5]">ADD NEW IDENTITY</h1>
    </div>

    <div class="bg-[#181818] border border-[#333333] rounded-[18px] p-[32px]">
        <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-[12px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-2">NAMA LENGKAP</label>
                <input type="text" name="name" required class="w-full bg-[#121212] border border-[#333333] text-[#F5F5F5] rounded-md px-4 py-3 text-[16px] font-light focus:outline-none focus:border-[#C1121F] transition">
            </div>

            <div>
                <label class="block text-[12px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-2">USERNAME</label>
                <input type="text" name="username" required class="w-full bg-[#121212] border border-[#333333] text-[#F5F5F5] rounded-md px-4 py-3 text-[16px] font-light focus:outline-none focus:border-[#C1121F] transition">
            </div>

            <div>
                <label class="block text-[12px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-2">PASSWORD ACCESS</label>
                <input type="password" name="password" required class="w-full bg-[#121212] border border-[#333333] text-[#F5F5F5] rounded-md px-4 py-3 text-[16px] font-light focus:outline-none focus:border-[#C1121F] transition">
            </div>

            <div>
                <label class="block text-[12px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-2">ASSIGN SYSTEM ROLE</label>
                <select name="role" class="w-full bg-[#121212] border border-[#333333] text-[#F5F5F5] rounded-md px-4 py-3 text-[16px] font-light focus:outline-none focus:border-[#C1121F] transition">
                    <option value="siswa">Siswa (Anggota)</option>
                    <option value="sekretaris">Sekretaris (Log Absensi)</option>
                    <option value="bendahara">Bendahara (Kas Kelas)</option>
                    <option value="walikelas">Wali Kelas (Input Nilai)</option>
                    <option value="admin">Admin (Full Control)</option>
                </select>
            </div>

            <div class="flex gap-4 pt-2">
                <button type="submit" class="bg-[#C1121F] hover:bg-[#A50F1A] text-[#F5F5F5] text-[15px] font-bold uppercase tracking-[0.08em] px-6 py-3 rounded-full transition cursor-pointer">
                    SAVE SYSTEM
                </button>
                <a href="{{ route('users.index') }}" class="border border-[#333333] hover:bg-[#121212] text-[#B9B9B9] text-[15px] font-bold uppercase tracking-[0.08em] px-6 py-3 rounded-full transition flex items-center">
                    CANCEL
                </a>
            </div>
        </form>
    </div>
</div>
@endsection