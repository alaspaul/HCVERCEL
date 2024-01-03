<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class PhysicalExam_values extends Model
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

    public function PhysicalExam_Attributes(): HasOneOrMany
    {
        return $this->hasOne(PhysicalExam_Attributes::class, 'foreign_key', 'PEA_id');
    }

    public function patient(): HasOneOrMany
    {
        return $this->hasOne(Patient::class, 'foreign_key', 'patient_id');
    }
}
