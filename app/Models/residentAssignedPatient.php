<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class residentAssignedPatient extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'RAP_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'RAP_id',
        'isFinished'.
        'resident_id',
        'patient_id',
    ];


    
    public function resident()
    {
        return $this->belongsTo(resident::class, 'resident_id', 'resident_id');
    }

    public function patient()
    {
        return $this->belongsTo(patient::class, 'patient_id', 'patient_id');
    }

}
