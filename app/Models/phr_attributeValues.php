<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneOrMany;

class phr_attributeValues extends Model
{ 
    use HasFactory;

    protected $primaryKey = 'attributeVal_id';

    public $incrementing = false;
    protected $keyType = 'string';


    protected $fillable = [
        'attributeVal_id',
        'attributeVal_values',
        'patient_id',
        'categoryAtt_id',
        'sequence',
    ];

    public function patient(): HasOneOrMany
    {
        return $this->hasOneOrMany(patient::class, 'patient_id', 'patient_id');
    }
 

    public function categoryAttribute(): HasOneOrMany
    {
        return $this->hasOneOrMany(phr_categoryAttributes::class, 'categoryAtt_id', 'categoryAtt_id');
    }

}
