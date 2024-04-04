<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class lab_results extends Model
{
    use HasFactory;
    protected $primaryKey = 'labResults_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'labResults_id',
        'labResultDate',
        'results',
        'patient_id',
    ];

    public function patient(): HasOneOrMany
    {
        return $this->hasOneOrMany(patient::class, 'patient_id', 'patient_id');
    }

}
