<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'order_status',
        'date_ordered',
        'status',
        'total_price',
        'order_number',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    // Add any additional relationships, scopes, or methods here
}
