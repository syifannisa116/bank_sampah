<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pencapaian extends Model
{
    protected $table = 'pencapaian';

    // protected $primaryKey = 'id_pencapaian';

    protected $fillable = [
        'nama_pencapaian',
        'deskripsi',
        'badge',
        'target',
        'satuan_target',
        'status',
    ];

    protected function casts(): array
    {
        return ['target' => 'integer'];
    }

    public function nasabahPencapaian()
    {
        return $this->hasMany(
            NasabahPencapaian::class,
            'id_pencapaian'
        );
    }

    public function nasabah()
    {
        return $this->belongsToMany(
            Nasabah::class,
            'nasabah_pencapaian',
            'id_pencapaian',
            'id_nasabah'
        )->withPivot([
            'id_nasabah_pencapaian',
            'tgl_diperoleh',
            'progress',
            'status',
        ])->withTimestamps();
    }
}
