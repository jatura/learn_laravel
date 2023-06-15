<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function customer()
    {
        return $this->belongsTo(Product::class);
    }
    protected $fillable = [
        'barcode',
        'name',
        'customer_id',
        'purchase_date'
    ];
}
