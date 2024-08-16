<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_id',
        'quantity',
        'delivery_date',
        'customer_email',
    ];

    // Hubungan dengan model Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    // Hubungan dengan model Customer (opsional)
    public function customer()
    {
        return $this->belongsTo(Customer::class); // Jika ada model Customer
    }
}
