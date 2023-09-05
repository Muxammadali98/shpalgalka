<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Discount extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'image',
        'title',
        'description',
        'category_id',
        'corusel_text',
        'sub_title'
    ];

    public function conditions(){
        return $this->hasMany(Condition::class);
    }
}
