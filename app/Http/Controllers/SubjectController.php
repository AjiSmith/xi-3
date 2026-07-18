<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::latest()->get();
        return view('dashboard.admin.subjects.index', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mapel' => 'required|string|unique:subjects,kode_mapel',
            'nama_mapel' => 'required|string|max:255',
            'kkm' => 'required|numeric|min:0|max:100',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Mata pelajaran baru berhasil diregistrasi.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Mata pelajaran berhasil dihapus dari sistem.');
    }
}