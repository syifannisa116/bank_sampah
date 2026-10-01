<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatAktivitas extends Model
{
    protected $table = 'riwayat_aktivitas';
    // protected $primaryKey = 'id_riwayat_aktivitas';

    protected $fillable = [
        'id_user',
        'aktivitas',
        'modul',
        'id_data',
        'alasan',
        'data_lama',
        'data_baru',
    ];

    protected function casts(): array
    {
        return [
            'data_lama' => 'array',
            'data_baru' => 'array',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
