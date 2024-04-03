<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        return $this->hasOneOrMany(physicalExam_categories::class, 'physicalExam_id', 'physicalExam_id');
    }

    public function patient(): HasOneOrMany
    {
        return $this->hasOneOrMany(patient::class, 'patient_id', 'patient_id');
    }
}
