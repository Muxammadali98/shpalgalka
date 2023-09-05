<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prize_Saller extends Model
{
    use HasFactory;
    protected $fillable = [
        'prize_id',
        'saller_id'
    ];

    public function prize() {
        return $this->belongsTo(Prize::class);
    }
}
