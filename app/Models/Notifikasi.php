<?php

class Notifikasi extends Model
{
    protected $table = 'notifikasi';
    // protected $primaryKey = 'id_notifikasi';

    protected $fillable = [
        'id_nasabah', 'judul', 'pesan', 'jenis', 'status_baca',
    ];

    protected function casts(): array
    {
        return ['status_baca' => 'boolean'];
    }

    public function nasabah()
    {
        return $this->belongsTo(Nasabah::class, 'id_nasabah');
    }
}