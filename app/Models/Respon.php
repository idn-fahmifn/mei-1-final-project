<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respon extends Model
{
    protected $table = 'respon';
    protected $fillable = [
        'detail_respon', 'id_laporan'
    ];

    public function laporan()
    {
        return $this->belongsTo(Respon::class, 'id_laporan');
    }
}
