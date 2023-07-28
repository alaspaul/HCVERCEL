<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class observation extends Model
{
    use HasFactory;

    protected $primaryKey = 'observation_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'observation_id',
        'observationDate',
        'observation',
        'patient_id',
    ];

    public function patient(): HasOneOrMany
    {
        return $this->hasOne(patient::class, 'foreign_key', 'patient_id');
    }
}
