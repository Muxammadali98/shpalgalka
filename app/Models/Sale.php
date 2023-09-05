<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory, SoftDeletes ;

    protected $fillable = [
        'saller_id',
        'phone',
        'startPrice',
        'date',
        'status'
    ];

    public function saller() {
            return $this->belongsTo(Saller::class);
    }
     
    public function products() {
            return $this->hasMany(Sale_Product::class);
    }

}
