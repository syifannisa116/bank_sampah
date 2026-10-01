<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penarikan extends Model
{
    protected $table = 'penarikan';

    // protected $primaryKey = 'id_penarikan';

    protected $fillable = [
        'id_nasabah', 'id_petugas', 'nomor_transaksi', 'nominal',
        'tgl_pengajuan', 'tgl_diproses', 'metode_penarikan',
        'nama_bank_ewallet', 'nomor_tujuan', 'status',
        'catatan', 'bukti_transfer',
    ];

    protected function casts(): array
    {
        return [
            'nominal' => 'decimal:2',
            'tgl_pengajuan' => 'datetime',
            'tgl_diproses' => 'datetime',
        ];
    }

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah');
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'id_petugas');
    }

    public function mutasiSaldo()
    {
        return $this->hasOne(MutasiSaldo::class, 'id_penarikan');
    }
}
