<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurs extends Model
{
    protected $table = "tb_currency";

    protected $primaryKey = 'id_currency';

    protected $fillable = [
        'nama_currency',
        'country',
        'nilai_kurs',
        'jenis_kurs',
        'img_flag'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function Detail()
    {
        return $this->hasMany(KursDetail::class, 'id_currency', 'id_currency');
    }
}
