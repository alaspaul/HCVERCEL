<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    use HasFactory;

    protected $primaryKey = 'patient_id';
    
    public $incrementing = false;
    protected $keyType = 'string';

    const CREATED_AT = 'creation_date';
    const UPDATED_AT = 'updated_date';
    protected $fillable = [
        'patient_id',
        'patient_fName',
        'patient_lName', 
        'patient_mName',
        'patient_age',
        'patient_sex',
        'patient_vaccine_stat',
    ];

     
}
