<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }

    protected $fillable = [
        'customer_id', 
        'equipmentBrand', 
        'equipmentModel', 
        'equipmentSN',
        'equipmentAccesories',
        'reportedFail', 
        'solution', 
        'diagnosticCost',
        'finalCost',
        'entranceDate',
        'exitDate',
        'state_id'
    ];

    

}
