@extends('layouts.app')

@section('dashboard-content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <div>
            <span class="text-[#C1121F] text-[12px] font-bold tracking-[0.14em] uppercase">// DATABASE</span>
            <h1 class="text-[37.8px] font-bold uppercase text-[#F5F5F5]">MANAGEMENT USER</h1>
        </div>
        <a href="{{ route('users.create') }}" class="bg-[#C1121F] hover:bg-[#A50F1A] text-[#F5F5F5] text-[15px] font-bold uppercase tracking-[0.08em] px-[24px] py-[10px] rounded-full transition">
            + TAMBAH USER
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-500/10 border border-green-500 text-green-500 text-[14px] p-3 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-[#181818] border border-[#333333] rounded-[18px] overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="border-b border-[#333333] bg-[#121212] text-[#B9B9B9] text-[12px] font-bold uppercase tracking-wider">
                    <th class="p-4">NAMA</th>
                    <th class="p-4">USERNAME</th>
                    <th class="p-4">ROLE</th>
                    <th class="p-4 text-right">AKSI</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-[#333333] text-[14px] font-light">
                @foreach($users as $user)
                <tr class="hover:bg-[#121212]/50 transition">
                    <td class="p-4 font-semibold text-[#F5F5F5]">{{ $user->name }}</td>
                    <td class="p-4 text-[#B9B9B9]">{{ $user->username }}</td>
                    <td class="p-4">
                        <span class="bg-[#1B1B1B] text-[#C1121F] text-[12px] font-bold uppercase tracking-wider px-2 py-1 rounded-full border border-[#333333]">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td class="p-4 text-right">
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Eliminasi user ini?');" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-[#C1121F] hover:underline uppercase text-[12px] font-bold tracking-wider cursor-pointer">
                                [ DELETE ]
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection