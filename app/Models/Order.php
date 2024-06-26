<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'customer_name',
        'phone_number',
        'address',
        'cpf',
        'status',
        'total_amount'
    ];

    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('quantity', 'price')->withTimestamps();
    }
}
