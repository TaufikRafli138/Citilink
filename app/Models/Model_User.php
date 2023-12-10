<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_User extends Model
{
    protected $table = 'Tabel_User';
    protected $primaryKey = 'id';
    protected $fillable = [
        'NIK',
        'Nama',
        'Gender',
        'Alamat',
    ];

    // protected $casts = [
    //     'NIK' => 'integer',
    // ];
}
