<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HargaSampah extends Model
{
    protected $table = 'harga_sampah';

    // protected $primaryKey = 'id_harga';

    protected $fillable = [
        'id_jenis_sampah', 'harga_per_kg',
        'berlaku_mulai', 'berlaku_selesai', 'status',
    ];

    protected function casts(): array
    {
        return [
            'harga_per_kg' => 'decimal:2',
            'berlaku_mulai' => 'date',
            'berlaku_selesai' => 'date',
        ];
    }

    public function jenisSampah()
    {
        return $this->belongsTo(JenisSampah::class, 'id_jenis_sampah');
    }
}
