<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Vital extends Model
{
    use HasFactory;

    
    protected $primaryKey = 'patientVitals_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'patientVitals_id',
        'patientVitals_Bp',
        'patientVitals_temp',
        'patientVitals_pulseRate',
        'patientVitals_breathingRate',
        'patient_id',
    ];


    
    public function floor(): HasOneOrMany
    {
        return $this->hasOne(Floor::class, 'foreign_key', 'patient_id');
    }
}
