<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MutasiSaldo extends Model
{
    protected $table = 'mutasi_saldo';

    // protected $primaryKey = 'id_mutasi';

    protected $fillable = [
        'id_nasabah', 'id_setoran', 'id_penarikan', 'jenis_mutasi',
        'jumlah', 'saldo_sebelum', 'saldo_sesudah', 'tgl_mutasi', 'keterangan',
    ];

    protected function casts(): array
    {
        return [
            'jumlah' => 'decimal:2',
            'saldo_sebelum' => 'decimal:2',
            'saldo_sesudah' => 'decimal:2',
            'tgl_mutasi' => 'datetime',
        ];
    }

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah');
    }

    public function setoran()
    {
        return $this->belongsTo(Setoran::class, 'id_setoran');
    }

    public function penarikan()
    {
        return $this->belongsTo(Penarikan::class, 'id_penarikan');
    }
}
