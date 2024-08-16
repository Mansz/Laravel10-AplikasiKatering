<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', // Tambahkan kolom ini
        'email', // Contoh kolom lain
        'address', // Contoh kolom lain
        'contact', // Contoh kolom lain
        'password', // Tambahkan kolom ini
        // Tambahkan kolom lain sesuai kebutuhan
    ];
}
