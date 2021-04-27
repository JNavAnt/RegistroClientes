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
        'exitDate'
    ];

    

}
