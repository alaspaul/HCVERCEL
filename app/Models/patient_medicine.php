<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Patient_medicine extends Model
{
    use HasFactory;
    protected $primaryKey = 'patientMedicine_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'patientMedicine_id',
        'patientMedicinedate',
        'medecine_frequency',
        'patient_id',
        'medicine_id',
    ];

    public function patient(): HasOneOrMany
    {
        return $this->hasOne(Patient::class, 'foreign_key', 'patient_id');
    }

    public function medecine(): HasOneOrMany
    {
        return $this->hasOne(Medicine::class, 'foreign_key', 'medicine_id');
    }
}
