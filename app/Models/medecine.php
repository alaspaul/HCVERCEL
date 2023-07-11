<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medecine extends Model
{
    use HasFactory;

    protected $primaryKey = 'medecine_id';
    
    public $incrementing = false;
    protected $keyType = 'string';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    protected $fillable = [
        'medecine_id',
        'medecine_name',
        'medecine_brand',
        'medecine_dosage',
        'medecine_price',
    ];
    
}
