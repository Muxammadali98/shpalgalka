<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Saller extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'password',
        'phone',
        'surname',
        'email',
        'prize_id',
        'image'
    ];

    public function sales(){
        return $this->hasMany(Sale::class)->with('products');
    }

    public function prizs() {
        return $this->hasMany(Prize_Saller::class)->with('prize');
}
    
}
