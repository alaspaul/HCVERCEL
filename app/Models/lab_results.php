<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class lab_results extends Model
{
    use HasFactory;
    protected $primaryKey = 'labResult_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'labResult_id',
        'labResultDate',
        'results',
        'patient_id',
    ];

    public function patient(): HasOneOrMany
    {
        return $this->hasOne(patient_healthRecord::class, 'foreign_key', 'patient_id');
    }

}
