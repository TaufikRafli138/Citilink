<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Auth;

class AccountModel extends Model
{
    // use HasApiTokens, Notifiable;
    protected $table = 'Tabel_Account';
    protected $primaryKey = 'id';
    protected $fillable = [
        'Username',
        'Password',
        'NIK',
        'Role_id',
    ];

}
