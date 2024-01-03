<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class Lab_results extends Model
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
        return $this->hasOne(Patient::class, 'foreign_key', 'patient_id');
    }

}
