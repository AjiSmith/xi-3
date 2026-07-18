<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Subject;
use App\Models\Absensi;
use App\Models\KasKelas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Rekapitulasi Analytics Dummy & Database Data
        $data['total_siswa'] = User::where('role', 'siswa')->count();
        $data['total_mapel'] = Subject::count(); // Masih 0 karena belum diisi
        $data['total_absensi'] = Absensi::where('tanggal', today())->count(); // Masih 0 karena belum diisi
        $data['total_kas'] = KasKelas::where('tipe', 'masuk')->sum('jumlah'); // Masih 0 karena belum diisi

        $startDate = date('Y-m-01');
        $endDate = date('Y-m-t');

        // 2. Ambil semua data siswa & absensi dalam rentang tersebut
        $totalSiswa = User::where('role', 'siswa')->count();
        $allAbsensi = Absensi::whereBetween('tanggal', [$startDate, $endDate])->get();

        // 3. Hitung persentase kehadiran total kelas
        $totalHadir = $allAbsensi->where('status', 'hadir')->count();
        $totalLog = $allAbsensi->count(); // total seluruh log (hadir, sakit, izin, alfa)

        // Mencegah pembagian dengan angka nol jika data absensi masih kosong
        $persentaseKelas = $totalLog > 0 ? round(($totalHadir / $totalLog) * 100, 1) : 0;
        return view('dashboard.index', compact('persentaseKelas', 'totalSiswa') + $data);
    }
}
