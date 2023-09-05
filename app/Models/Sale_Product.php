<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale_Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'sale_id',
        'product_id',
        'status',
        'count',
        'date',
        'startPrice'
    ];

    public function sale()  {
        return $this->belongsTo(Sale::class);
    }

}
