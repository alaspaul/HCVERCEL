<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class patient_medicine extends Model
{
    use HasFactory;
    protected $primaryKey = 'patientMedicine_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'patientMedicine_id',
        'patientMedicinedate',
        'medicine_frequency',
        'patient_id',
        'medicine_id',
    ];

    public function patient(): HasOneOrMany
    {
        return $this->hasOneOrMany(patient::class, 'patient_id', 'patient_id');
    }

    public function medicine(): HasOneOrMany
    {
        return $this->hasOneOrMany(medicine::class, 'medicine_id', 'medicine_id');
    }
}
