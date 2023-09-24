<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class physicalExam_values extends Model
{
    use HasFactory;

    protected $primaryKey = 'PAV_id';
    
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'PAV_value',
        'patient_id',
        'PEA_id'
    ];

    public function formCategory(): HasOneOrMany
    {
        return $this->hasOne(physicalExam_Attributes::class, 'foreign_key', 'PEA_id');
    }

    public function patient(): HasOneOrMany
    {
        return $this->hasOne(patient::class, 'foreign_key', 'patient_id');
    }
}
