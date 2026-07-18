<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absensi;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = $request->get('tanggal', date('Y-m-d'));
        
        // Ambil semua user dengan role siswa
        $siswa = User::where('role', 'siswa')->get();
        
        // Ambil data absensi pada tanggal terpilih
        $absensi = Absensi::where('tanggal', $tanggal)->get()->keyBy('user_id');

        return view('dashboard.sekretaris.absensi.index', compact('siswa', 'absensi', 'tanggal'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kehadiran' => 'required|array',
            'kehadiran.*' => 'required|in:hadir,sakit,izin,alfa',
        ]);

        $tanggal = $request->tanggal;

        foreach ($request->kehadiran as $siswaId => $status) {
            Absensi::updateOrCreate(
                [
                    'user_id' => $siswaId,
                    'tanggal' => $tanggal
                ],
                [
                    'status' => $status,
                    'keterangan' => $request->keterangan[$siswaId] ?? null
                ]
            );
        }

        return redirect()->route('absensi.index', ['tanggal' => $tanggal])
            ->with('success', 'Log absensi berhasil diperbarui.');
    }

    public function rekap(Request $request)
{
    // Default rentang waktu (bulan ini)
    $startDate = $request->get('start_date', date('Y-m-01'));
    $endDate = $request->get('end_date', date('Y-m-t'));

    // Ambil semua siswa
    $siswa = User::where('role', 'siswa')->get();

    // Ambil data absensi dalam rentang tanggal
    $allAbsensi = Absensi::whereBetween('tanggal', [$startDate, $endDate])->get()->groupBy('user_id');

    $rekap = [];

    foreach ($siswa as $s) {
        $logs = $allAbsensi->get($s->id) ?? collect();
        
        $hadir = $logs->where('status', 'hadir')->count();
        $sakit = $logs->where('status', 'sakit')->count();
        $izin = $logs->where('status', 'izin')->count();
        $alfa = $logs->where('status', 'alfa')->count();
        
        $totalHari = $hadir + $sakit + $izin + $alfa;
        // Hitung persentase kehadiran (mencegah pembagian dengan nol)
        $persentase = $totalHari > 0 ? round(($hadir / $totalHari) * 100, 1) : 0;

        $rekap[$s->id] = [
            'hadir' => $hadir,
            'sakit' => $sakit,
            'izin' => $izin,
            'alfa' => $alfa,
            'total' => $totalHari,
            'persentase' => $persentase
        ];
    }

    return view('dashboard.sekretaris.absensi.rekap.rekap', compact('siswa', 'rekap', 'startDate', 'endDate'));
}
}