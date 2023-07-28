<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class patientHistory extends Model
{
    use HasFactory;

    protected $primaryKey = 'patientHistory_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'patientHistory_id',
        'patient_id',

    ];

    public function patient(): HasOneOrMany
    {
        return $this->hasOne(patient::class, 'foreign_key', 'patient_id');
    }

   
}
