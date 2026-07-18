<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nilai;
use App\Models\Subject;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        // Ambil mapel pertama sebagai default jika filter kosong
        $defaultMapel = Subject::first()->nama_mapel ?? 'Matematika';
        $mapel = $request->get('subject', $defaultMapel);
        
        $siswa = User::where('role', 'siswa')->get();
        $subjects = Subject::all();
        
        // Mengambil data nilai berdasarkan filter mapel aktif
        $grades = Nilai::where('mata_pelajaran', $mapel)->get()->keyBy('user_id');

        return view('dashboard.walikelas.nilai.index', compact('siswa', 'grades', 'mapel', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mata_pelajaran' => 'required|string',
            'grades' => 'required|array',
            'grades.*.tugas' => 'required|numeric|min:0|max:100',
            'grades.*.uts' => 'required|numeric|min:0|max:100',
            'grades.*.uas' => 'required|numeric|min:0|max:100',
        ]);

        foreach ($request->grades as $siswaId => $nilai) {
            Nilai::updateOrCreate(
                [
                    'user_id' => $siswaId,
                    'mata_pelajaran' => $request->mata_pelajaran
                ],
                [
                    'tugas' => $nilai['tugas'],
                    'uts' => $nilai['uts'],
                    'uas' => $nilai['uas'],
                ]
            );
        }

        return redirect()->route('nilai.index', ['subject' => $request->mata_pelajaran])
            ->with('success', 'Rekam nilai berhasil disinkronisasi ke sistem.');
    }
}