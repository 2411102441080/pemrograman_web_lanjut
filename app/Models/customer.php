<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address',
        'provinces_id',
        'regencies_id',
        'zip_code',
    ];
    // Relasi ke model Province
    public function province()
    {
        return $this->belongsTo(Province::class, 'provinces_id');
    }

    // Relasi ke model Regency
    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regencies_id');
    }
}
    