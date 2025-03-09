<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'desired_delivery_date',
        'number',
        'fee_per_weight',
        'fee_per_km',
        'fee_per_stop',
        'fee_per_delivery',
        'delivered_at',
        'status',
        'address',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
