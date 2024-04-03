<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class patientHistory extends Model
{
    use HasFactory;

    protected $primaryKey = 'ph_id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'ph_id',
        'ph_changes',
        'history_id',
        'attributeVal_id1',
        'attributeVal_id2',
        'patient_id',
        'sequence',
    ];

    public function history(): HasOneOrMany
    {
        return $this->hasOneOrMany(History::class, 'history_id', 'history_id');
    }

    public function phr_attributeValues1(): HasOneOrMany
    {
        return $this->hasOneOrMany(phr_attributeValues::class, 'phr_attributeValues_id', 'attributeVal_id1');
    }

    public function phr_attributeValues2(): HasOneOrMany
    {
        return $this->hasOneOrMany(phr_attributeValues::class, 'phr_attributeValues_id', 'attributeVal_id2');
    }

    public function patient(): HasOneOrMany
    {
        return $this->hasOneOrMany(Patient::class, 'patient_id', 'patient_id');
    }
}