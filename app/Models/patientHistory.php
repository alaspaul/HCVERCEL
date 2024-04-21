<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function history(): HasMany
    {
        return $this->hasMany(History::class, 'history_id', 'history_id');
    }

    public function phr_attributeValues1(): HasMany
    {
        return $this->hasMany(phr_attributeValues::class, 'phr_attributeValues_id', 'attributeVal_id1');
    }

    public function phr_attributeValues2(): HasMany
    {
        return $this->hasMany(phr_attributeValues::class, 'phr_attributeValues_id', 'attributeVal_id2');
    }

    public function patient(): HasMany
    {
        return $this->hasMany(Patient::class, 'patient_id', 'patient_id');
    }
}