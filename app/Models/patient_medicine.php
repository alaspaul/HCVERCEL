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
        'medecine_frequency',
        'patient_id',
        'medicine_id',
    ];

    public function patient(): HasOneOrMany
    {
        return $this->hasOne(patient::class, 'foreign_key', 'patient_id');
    }

    public function medecine(): HasOneOrMany
    {
        return $this->hasOne(medicine::class, 'foreign_key', 'medicine_id');
    }
}
