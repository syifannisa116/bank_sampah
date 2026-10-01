<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $table = 'nasabah';

    // protected $primaryKey = 'id_nasabah';

    protected $fillable = [
        'id_user', 'nama', 'no_telp', 'alamat', 'saldo',
    ];

    protected function casts(): array
    {
        return ['saldo' => 'decimal:2'];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function setoran()
    {
        return $this->hasMany(Setoran::class, 'id_nasabah');
    }

    public function penarikan()
    {
        return $this->hasMany(Penarikan::class, 'id_nasabah');
    }

    public function mutasiSaldo()
    {
        return $this->hasMany(MutasiSaldo::class, 'id_nasabah');
    }

    public function notifikasi()
    {
        return $this->hasMany(Notifikasi::class, 'id_nasabah');
    }

    public function nasabahAchievements()
    {
        return $this->hasMany(NasabahAchievement::class, 'id_nasabah');
    }

    public function achievements()
    {
        return $this->belongsToMany(
            Achievement::class,
            'nasabah_achievement',
            'id_nasabah',
            'id_achievement'
        )->withPivot(['id_nasabah_achievement', 'tgl_diperoleh', 'progress', 'status'])
            ->withTimestamps();
    }
}
