<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    /**
     * Menghubungkan model secara eksplisit ke tabel database.
     * Secara default Laravel akan mencari tabel 'absensis'. Kita deklarasikan 'absensi' 
     * atau sesuaikan dengan nama tabel riil di database Anda.
     *
     * @var string
     */
    protected $table = 'absensis';

    /**
     * Atribut yang dapat diisi secara massal (Mass Assignable).
     * Diselaraskan dengan kolom pencarian dan pembaharuan di AbsensiController.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',    // ID Siswa
        'tanggal',    // Tanggal absensi (Y-m-d)
        'status',     // Status kehadiran ('hadir', 'sakit', 'izin', 'alfa')
        'keterangan', // Keterangan tambahan opsional
    ];

    /**
     * Relasi balik (Belongs To) ke model User.
     * Menandakan bahwa setiap baris data absensi dimiliki oleh seorang siswa.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}