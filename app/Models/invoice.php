<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $fillable = [
        'customer_name',
        'price_per_meter',
        'total_price',
        'stock_id',
        'product_id'
    ];

}
