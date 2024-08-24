<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cutis()
    {
        return $this->hasMany(Cuti::class, 'nomor_induk', 'nomor_induk');
    }

    public function sisaCuti()
    {
        $totalCuti = $this->cutis()->sum('lama_cuti');

        $quotaCuti = 12;

        return $quotaCuti - $totalCuti;
    }
}
