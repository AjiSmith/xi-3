<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    // Menghubungkan eksplisit ke tabel database 'grades'
    protected $table = 'grades';

    // Anti MassAssignmentException
    protected $fillable = [
        'user_id',
        'mata_pelajaran',
        'tugas',
        'uts',
        'uas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}