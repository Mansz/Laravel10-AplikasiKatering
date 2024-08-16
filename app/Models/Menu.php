<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model // Ubah 'Menus' ke 'Menu'
{
    use HasFactory;

    protected $fillable = [
        'merchant_id',
        'name',
        'description',
        'price',
        'photo',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class); // Ubah 'Merchants' ke 'Merchant'
    }
}