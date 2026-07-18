<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KasKelas extends Model
{
    use HasFactory;

    /**
     * Menghubungkan model secara eksplisit ke tabel database.
     * Menggunakan snake_case sesuai konvensi default Laravel.
     *
     * @var string
     */
    protected $table = 'kas_kelas';

    /**
     * Atribut yang dapat diisi secara massal (Mass Assignable).
     * Diselaraskan dengan validasi dan parameter input di KasController.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',    // Diisi ID Siswa jika tipe 'masuk', atau null jika tipe 'keluar'
        'jumlah',     // Nominal uang kas
        'tipe',       // Nilai berupa 'masuk' atau 'keluar'
        'keterangan', // Deskripsi mutasi kas
        'tanggal',    // Waktu pencatatan kas
    ];

    /**
     * Relasi balik (Belongs To) ke model User.
     * Digunakan oleh KasController melalui metode: KasKelas::with('user')
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}