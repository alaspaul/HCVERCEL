<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'patient_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'patient_id',
        'patient_fName',
        'patient_lName',
        'patient_mName',
        'patient_age',
        'patient_sex',
    ];
}
