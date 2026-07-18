<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KasKelas;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function index()
    {
        // Hitung total uang masuk dan keluar
        $totalMasuk = KasKelas::where('tipe', 'masuk')->sum('jumlah');
        $totalKeluar = KasKelas::where('tipe', 'keluar')->sum('jumlah');
        $saldo = $totalMasuk - $totalKeluar;

        // Ambil riwayat log transaksi terbaru
        $logs = KasKelas::with('user')->latest()->get();
        
        // Ambil daftar siswa untuk pilihan dropdown pembayar
        $siswa = User::where('role', 'siswa')->get();

        return view('dashboard.bendahara.kas.index', compact('saldo', 'logs', 'siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|numeric|min:1',
            'tipe' => 'required|in:masuk,keluar',
            'keterangan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'user_id' => 'nullable|exists:users,id',
        ]);

        KasKelas::create([
            'user_id' => $request->tipe === 'masuk' ? $request->user_id : null,
            'jumlah' => $request->jumlah,
            'tipe' => $request->tipe,
            'keterangan' => $request->keterangan,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('kas.index')->with('success', 'Mutasi kas berhasil dicatat ke sistem.');
    }
}