<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    public function report(){
        return $this->hasMany(Report::class);
    }

    protected $fillable = [
        'fullName', 'business', 'email', 'phone'
    ];
}
