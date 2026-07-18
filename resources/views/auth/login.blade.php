@extends('layouts.login')

@section('content')
<div class="min-h-[80vh] flex items-center justify-center px-4 py-[112px]">
    <div class="bg-[#181818] border border-[#333333] rounded-[18px] p-[32px] w-full max-w-md">
        <div class="text-center mb-8">
            <span class="text-[#C1121F] text-[12px] font-bold tracking-[0.14em] uppercase">// Integrated Web-Class</span>
            <h2 class="text-[37.8px] font-bold text-[#F5F5F5] uppercase tracking-tight mt-1">Log-in Form</h2>
        </div>

        @if ($errors->any())
            <div class="bg-[#C1121F]/10 border border-[#C1121F] text-[#F5F5F5] text-[14px] p-3 rounded-md mb-4">
                Username atau password tidak valid.
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="username" class="block text-[12px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-2">USERNAME</label>
                <input type="text" name="username" id="username" value="{{ old('username') }}" required
                    class="w-full bg-[#121212] border border-[#333333] text-[#F5F5F5] rounded-md px-4 py-3 text-[16px] font-light focus:outline-none focus:border-[#C1121F] transition">
            </div>

            <div>
                <label for="password" class="block text-[12px] font-bold uppercase tracking-[0.1em] text-[#B9B9B9] mb-2">PASSWORD</label>
                <input type="password" name="password" id="password" required
                    class="w-full bg-[#121212] border border-[#333333] text-[#F5F5F5] rounded-md px-4 py-3 text-[16px] font-light focus:outline-none focus:border-[#C1121F] transition">
            </div>

            <button type="submit" 
                class="w-full bg-[#C1121F] hover:bg-[#A50F1A] text-[#F5F5F5] text-[15px] font-bold uppercase tracking-[0.08em] py-[14px] rounded-full transition cursor-pointer">
                LOGIN
            </button>
        </form>
    </div>
</div>
@endsection