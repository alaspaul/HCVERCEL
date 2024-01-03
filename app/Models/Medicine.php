<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $primaryKey = 'medicine_id';
    
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'medicine_id',
        'medicine_name',
        'medicine_brand',
        'medicine_dosage',
        'medicine_price',
        'medicine_type',
    ];
    
}
